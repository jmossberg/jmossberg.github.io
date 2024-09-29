---
layout: post
title:  "Implementing a minimalistic chat client and server using WebSocket++"
date:   2019-02-02 08:19:00
categories: posts 
---

# Contents<a name="contents"></a>

* [Contents](#contents)
* [Introduction](#introduction)
* [Example output from chat server and chat client](#example-output-from-chat-server-and-chat-client)
* [Toolchain](#toolchain)
* [Dependencies](#dependencies)
    * [Boost](#boost)
    * [Create private key and certificate for TLS](#certificate)
* [Download WebSocket++ release 0.8.1](#clone-websocket++-release-081)
* [Chat client](#client)
    * [Full code](#full-code)
    * [WebsocketClient and ChatClient](#websocketclient-and-chatclient)
        * [Setup](#setup)
        * [Connect](#connect)
        * [Send messages](#send-messages)
        * [Receive messages](#receive-messages)
        * [Exit](#exit-3)
* [Chat server](#chat-server)
    * [Full code](#full-code-2)
* [Makefile](#makefile)
* [Run server and client](#run-server-and-client)
* [Links](#links)
* [Notes](#notes)
* [Debugging](#debugging)
* [Running unit tests](#running-unit-tests)

# Introduction<a name="introduction"></a>

[WebSocket++](https://github.com/zaphoyd/websocketpp) is a C++ library that implements the [RFC6455](https://tools.ietf.org/html/rfc6455) [websocket](https://en.wikipedia.org/wiki/WebSocket) protocol. It is written by Peter Thorson. We use release [0.8.1](https://github.com/zaphoyd/websocketpp/releases/tag/0.8.1) of WebSocket++ in this post. Peter also maintains client and server [examples](https://github.com/zaphoyd/websocketpp/tree/0.8.1/examples) available at the WebSocket++ GitHub site.

The chat client and chat server examples in this article use [TLS](https://en.wikipedia.org/wiki/Transport_Layer_Security) to encrypt the communication. [openssl](https://www.openssl.org/) is used to generate a private key and a corresponding certificate used by the server to enable TLS.

The chat client does the following:

* Connect to server
* Ask user about name
* Show any incoming messages on the console
* Wait for user commands, either `send <message>` or `exit` 

The chat server does the following:

* Wait for incoming connections from clients
* Keep a list of all connected clients
* Receive client messages and echo to all clients except the client that sent the message
* Detect when client closes a connection and update list of client correspondingly

# Example output from chat server and chat client<a name="example-output-from-chat-server-and-chat-client"></a>

Below is example output from the chat server and two chat clients:

1. A user named Elsa connects with a client to the server
1. A user named Anna connects with a client to the server
1. Elsa sends message "Hello Anna!"
1. Anna sends message "Hello Elsa!"
1. Anna disconnects
1. Elsa disconnects

{% highlight plaintext %}
LD_LIBRARY_PATH=/home/jmossberg/lib/boost/boost_1_67_0/lib ./websocketpp_chat_server
Waiting for incoming connections on port 30001
New connection (count: 1)
<< Elsa connects
New connection (count: 2)
<< Anna connects
<< Elsa: Hello Anna!
<< Anna: Hello Elsa!
<< Anna disconnects
Closed connection (count: 1)
<< Elsa disconnects
Closed connection (count: 0)
{% endhighlight %}

Below is output from chat client started by Elsa:

{% highlight plaintext %}
LD_LIBRARY_PATH=/home/jmossberg/lib/boost/boost_1_67_0/lib ./websocketpp_chat_client
Name: Elsa
#
<< Anna connects
# send Hello Anna!<a name="send-hello-anna!"></a>
>> Elsa: Hello Anna!
#
<< Anna: Hello Elsa!
#
<< Anna disconnects
# exit<a name="exit"></a>
{% endhighlight %}

Below is output from chat client started by Anna:

{% highlight plaintext %}
LD_LIBRARY_PATH=/home/jmossberg/lib/boost/boost_1_67_0/lib ./websocketpp_chat_client
Name: Anna
#
<< Elsa: Hello Anna!
# send Hello Elsa!<a name="send-hello-elsa!"></a>
>> Anna: Hello Elsa!
# exit<a name="exit-2"></a>
{% endhighlight %}

# Toolchain<a name="toolchain"></a>

We use Ubuntu 18.04 with:

* g++ (Ubuntu 7.3.0-27ubuntu1~18.04) 7.3.0
* GNU Make 4.1
* OpenSSL 1.1.0g  2 Nov 2017

{% highlight plaintext %}
$ lsb_release -a
No LSB modules are available.
Distributor ID: Ubuntu
Description:    Ubuntu 18.04.1 LTS
Release:        18.04
Codename:       bionic
{% endhighlight %}

{% highlight plaintext %}
$ g++ --version
g++ (Ubuntu 7.3.0-27ubuntu1~18.04) 7.3.0
Copyright (C) 2017 Free Software Foundation, Inc.
This is free software; see the source for copying conditions.  There is NO
warranty; not even for MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
{% endhighlight %}

{% highlight plaintext %}
$ make --version
GNU Make 4.1
Built for x86_64-pc-linux-gnu
Copyright (C) 1988-2014 Free Software Foundation, Inc.
License GPLv3+: GNU GPL version 3 or later <http://gnu.org/licenses/gpl.html>
This is free software: you are free to change and redistribute it.
There is NO WARRANTY, to the extent permitted by law.
{% endhighlight %}

{% highlight plaintext %}
$ openssl version
OpenSSL 1.1.0g  2 Nov 2017
{% endhighlight %}


# Dependencies<a name="dependencies"></a>

## Boost<a name="boost"></a>

WebSocket++ supports multiple back ends to handle data transport. We use [Boost.Asio](https://www.boost.org/doc/libs/1_67_0/doc/html/boost_asio.html) shipped with Boost 1.67.0 in this article.

Boost.Asio [makes use](https://www.boost.org/doc/libs/1_67_0/doc/html/boost_asio/using.html#boost_asio.using.dependencies) of the error code functionality provided by the [Boost.System](https://www.boost.org/doc/libs/1_67_0/libs/system/doc/index.html) library. [Boost.System](https://www.boost.org/doc/libs/1_67_0/libs/system/doc/index.html) contains a .cpp file ([error_code.cpp](https://github.com/boostorg/system/blob/boost-1.67.0/src/error_code.cpp)) which needs to be built and put in a shared library file `libboost_system.so.1.67.0`.

Boost contains libraries that are so called [header only libraries](https://www.boost.org/doc/libs/1_67_0/more/getting_started/unix-variants.html#header-only-libraries). Boost.System is becoming a [header only library in Boost version 1.69](https://www.boost.org/doc/libs/1_69_0/libs/system/doc/html/system.html#changes_in_boost_1_69) but since we use 1.67.0 in this post we still need to build Boost.System.

Below is a script named `install_boost.sh` which downloads Boost, builds the Boost.System library and installs both header files and shared library files in `lib/boost/boost_1_67_0` of the current user's home folder. The script is based on the [getting started guide for Unix variants](https://www.boost.org/doc/libs/1_67_0/more/getting_started/unix-variants.html) found on the homepage for Boost.

{% highlight bash %}
{% include websocketpp-chat/install_boost.sh %}
{% endhighlight %}

We run the script by providing the Boost version to download:

{% highlight bash %}
$ ./install_boost.sh 1.67.0
{% endhighlight %}

## Create private key and certificate for TLS<a name="certificate"></a>

The server needs a private key and corresponding certificate to use TLS for encryption. Below is a script named `create_certificate.sh` which makes use of [openssl](https://www.openssl.org/) to generate the files.

{% highlight bash %}
{% include websocketpp-chat/create_certificate.sh %}
{% endhighlight %}

We run the script:

{% highlight bash %}
$ ./create_certificate.sh
{% endhighlight %}

# Download WebSocket++ release 0.8.1<a name="clone-websocket++-release-081"></a>

Below is a script named `download_websocketpp.sh` which downloads a specific release of [WebSocket++](https://github.com/zaphoyd/websocketpp) from GitHub:

{% highlight bash %}
{% include websocketpp-chat/download_websocketpp.sh %}
{% endhighlight %}

We run the script by providing the WebSocket++ release to download:

{% highlight bash %}
$ ./download_websocketpp.sh 0.8.1
{% endhighlight %}

# Chat client<a name="client"></a>

Let's create a minimalistic websocket chat client. We will show the full code first and then go through it step by step.

## Full code<a name="full-code"></a>

{% highlight cpp %}
{% include websocketpp-chat/websocketpp_chat_client.cpp %}
{% endhighlight %}

## WebsocketClient and ChatClient<a name="websocketclient-and-chatclient"></a>

The chat client is made up of two classes:

* WebsocketClient
* ChatClient

The WebsocketClient wraps the WebSocket++ library and provides a simplified interface to the ChatClient class.

The WebsocketClient offers four public methods to the ChatClient class:

* `connect`
* `send_message`
* `close_connection`
* `set_application_message_handler`

The ChatClient must first run `set_application_message_handler` to setup a callback function that the WebsocketClient can execute when receiving messages from the server. The ChatClient can then use `connect` to connect to a specific URL, `send_message` to send messages and `close_connection` to close the connection.

The ChatClient offers one public function named `start` that is used from `main()`.

### Setup<a name="setup"></a>

Let's go through how WebsocketClient and ChatClient are constructed at startup. We will start by looking at the `main()` function.

The `main()` function is small since everything is handled by the ChatClient and WebsocketClient classes. We create an instance of ChatClient and make a call to its `start` method. Any exception that occurs is caught and printed to standard out.

{% highlight cpp %}
int main(int argc, char* argv[]) {
  try {
    ChatClient chat_client;
    return chat_client.start();
  } catch (const std::exception& e) {
    std::cerr << "Exception in ChatClient: ";
    std::cerr << e.what() << '\n';
  }
  return 1;
}
{% endhighlight %}

We will go through what happens when instantiating the ChatClient:

{% highlight cpp %}
ChatClient chat_client;
{% endhighlight %}

The ChatClient has three private data members that are initalized during construction:

{% highlight cpp %}
private:
  WebsocketClient websocket_client_;
  bool running_;
  std::string name_;
{% endhighlight %}

* `running_` is used to keep track of whether the chat client should be kept alive.
* `name_` is used to store the name of person using the chat client.
* `websocket_client_` is an instance of `WebsocketClient` which interacts with the [WebSocket++](https://github.com/zaphoyd/websocketpp) library.

The ChatClient constructor will initialize the private data members and setup a callback function for receiving incoming messages from the chat server. The `set_application_message_handler` accepts a function object as argument and this is created using a lambda that will call the ChatClient `on_message` method.

{% highlight cpp %}
ChatClient() : websocket_client_{}, running_{true}, name_{""} {
    websocket_client_.set_application_message_handler(
    [this](std::string msg) { this->on_message(msg); });
  };
{% endhighlight %}

The WebsocketClient also has three private data members:

{% highlight cpp %}
 private:
  Client client_;
  ConnectionHdl connection_;
  std::function<void(std::string)> application_msg_handler_;
{% endhighlight %}

* `client_` is an endpoint defined by the WebSocket++ library. It can be used to create a new connection.
* `connection_` is a handle to a specific WebSocket connection. 
* `application_msg_handler_` is a callback to a function in ChatClient to handle incoming messages. We already set it in the previous section.

`Client` and `ConnectionHdl` are among a number of [type aliases](https://en.cppreference.com/w/cpp/language/type_alias) we setup to simplify the rest of the code.

{% highlight cpp %}
using Client = websocketpp::client<websocketpp::config::asio_tls_client>;
using ConnectionHdl = websocketpp::connection_hdl;
using SslContext = websocketpp::lib::asio::ssl::context;
using websocketpp::lib::placeholders::_1;
using websocketpp::lib::placeholders::_2;
{% endhighlight %}

The WebSocket++ `websocketpp::client` class accepts a template type argument to configure it, e.g. to select what back end to use for data transport. In this case we use `websocketpp::config::asio_tls_client` that configures Boost Asio as back end and encryption using TLS.

The types that these type alisases refer to are defined by the WebSocket++ library so we need to include the appropiate header files:

{% highlight cpp %}
#include <websocketpp/client.hpp>
#include <websocketpp/config/asio_client.hpp>
{% endhighlight %}

The WebsocketClient constructor does a number of things:

* Turn off WebSocket++ logging to standard out
* Initialize the underlying Boost.Asio library used by WebSocket++
* Setup handlers for the following events:
  * Open handler - called when connection is established
  * Message handler - called when a  message is received
  * TLS init handler - called when configuring the SSL encryption

{% highlight cpp %}
WebsocketClient() {
  turn_off_logging();
  client_.init_asio();
  set_handlers();
};
{% endhighlight %}

The `set_handlers()` method is shown below:

{% highlight cpp %}
void set_handlers() {
    client_.set_open_handler(websocketpp::lib::bind(
        &WebsocketClient::on_open, this, ::_1));
    client_.set_tls_init_handler(
        websocketpp::lib::bind(&WebsocketClient::on_tls_init, this));
    client_.set_message_handler(websocketpp::lib::bind(
        &WebsocketClient::on_message, this, ::_1, ::_2));
  }
{% endhighlight %}  

We use [bind](https://en.cppreference.com/w/cpp/utility/functional/bind) to create a function objects that we can pass as handlers to the WebSocket++ library. The first argument to `bind` is the function we want to use as handler. After that `bind` accepts bound arguments to as well as unbound arguments. We pass in a pointer to the client in the form of `this` as a bound argument to all three handlers. This is needed since the handlers are all class member functions. `bind` also accepts unbound arguments marked by placeholders `::_1` and `::_2`. The unbound arguments are used by WebSocket++ to pass arguments to the handlers.

* Open handler<br>
The `on_open` method is assigned as the open handler. It accepts one unbound argument which is used to pass a connection handler to the newly open connection.
* TLS init handler<br>
The `on_tls_init` method is assigned as the TLS init handler. The TLS init handler will be called when setting up an encrypted WebSocket connnection. The TLS init handler returns a so called TLS context. 
* Message handler<br>
The `on_message` method is assigned as the message handler. The message handler will be called when the chat client receives messages from the chat server. The handler accepts two unbound arguments; a connection handler and the message itself.

### Connect<a name="connect"></a>

We now have an instance of ChatClient and thus also an instance of WebsocketClient. Next step is to run the ChatClient `start` method that will trigger a connect to the chat server and then wait for incoming messages or commands from the chat client user.

The call to `start` in `main`:

{% highlight cpp %}
return chat_client.start();
{% endhighlight %}

The `start` method is shown below, it does three things:

* Asks the user for a name to use in the chat session
* Connects to the WebSocket server using the WebsocketClient.
* Setup a loop waiting for the user to enter commands

{% highlight cpp %}
int start() {
  std::cout << "Name: ";
  std::getline(std::cin, name_);

  auto websocket_client_thread = 
    websocket_client_.connect("wss://localhost:30001");
  websocket_client_.send_message(std::string{name_ + " connects"});

  while (running_) {
    std::string input;
    std::cout << "# " << std::flush;
    std::getline(std::cin, input);
    if (input == "exit") {
      handle_exit();
    } else if (input.substr(0, 5) == "send ") {
      handle_send_message(input);
    } else {
      handle_help();
    }
  }

  websocket_client_thread.join();
  return 0;
}
{% endhighlight %}

The WebsocketClient `connect` method is shown below:

{% highlight cpp %}
websocketpp::lib::thread connect(std::string url) {
    websocketpp::lib::error_code ec;
    auto connection = client_.get_connection(url, ec);
    client_.connect(connection);
    websocketpp::lib::thread t1(&Client::run, &client_);
    wait_for_connection_established(connection);
    return t1;
}
{% endhighlight %}

We retrieve a connection object using the `get_connection` method that we pass to the WebSocket++ client `connect` method. However no action takes place until the WebSocket++ client `run` method is executed. We do this in a separate thread since it is blocking and will run Boost Asio underneath. We make sure that the connection has been established before we return a handle to the thread from the function.

The `wait_for_connection_established` method is shown below:

{% highlight cpp %}
  void wait_for_connection_established(Client::connection_ptr connection) {
    while (connection->get_state() == websocketpp::session::state::connecting) {
      std::this_thread::sleep_for(std::chrono::milliseconds(50));
    }
}
{% endhighlight %}

The open handler in WebsocketClient is called by the WebSocket++ library when establishing a new connection. It simply stores the handle to the new connection as shown belo.

{% highlight cpp %}
void on_open(ConnectionHdl hdl) {
  connection_ = hdl;
}
{% endhighlight %}

### Send messages<a name="send-messages"></a>

The user of the chat client can send a message using the `send` command, for example:

{% highlight plain %}
# send hello
{% endhighlight %}

This will trigger a call to `handle_send_message` which will call `send_message` in WebsocketClient with the message as argument.

{% highlight cpp %}
void handle_send_message(std::string input) {
  std::string msg_with_name = extract_message_and_add_name(input);
  std::cout << ">> " << msg_with_name << std::endl;
  websocket_client_.send_message(msg_with_name);
}
{% endhighlight %}

The WebsocketClient will pass the message on to the WebSocket++ library.

{% highlight cpp %}
void send_message(std::string msg) {
  client_.send(connection_, msg, websocketpp::frame::opcode::text);
}
{% endhighlight %}

The WebSocket++ library needs a connection handler and a message type. The type in this case is `websocketpp::frame::opcode::text`.

### Receive messages<a name="receive-messages"></a>

Incoming messages are passed on to the WebsocketClient `on_message` method by the WebSocket++ library according to how we setup the handlers in the [Setup](#setup).

{% highlight cpp %}
void on_message(ConnectionHdl hdl,
                websocketpp::config::asio_client::message_type::ptr msg) {
  application_msg_handler_(msg->get_payload());
}
{% endhighlight %}

WebsocketClient will call the `application_msg_handler_` we set to the ChatClient `on_message` method in the [Setup](#setup).

{% highlight cpp %}
void on_message(std::string msg) {
  std::cout << std::endl;
  std::cout << "<< " << msg << std::endl;
  std::cout << "# " << std::flush;
}
{% endhighlight %}

The `on_message` method will simply print out the received message to standard out.

### Exit<a name="exit-3"></a>









# Chat server<a name="chat-server"></a>

Let's create a minimalistic websocket server.

## Full code<a name="full-code-2"></a>

{% highlight cpp %}
{% include websocketpp-chat/websocketpp_chat_server.cpp %}
{% endhighlight %}

# Makefile<a name="makefile"></a>

{% highlight plaintext %}
{% include websocketpp-chat/Makefile %}
{% endhighlight %}

# Run server and client<a name="run-server-and-client"></a>

First we start the server:
{% highlight plaintext %}
make run_chat_server
{% endhighlight %}

Then we start the client
{% highlight plaintext %}
make run_chat_client
{% endhighlight %}

Server output:
{% highlight plaintext %}
{% endhighlight %}

Client output:
{% highlight plaintext %}
{% endhighlight %}



# Links<a name="links"></a>

* [WebSocket++ @ GitHub](https://github.com/zaphoyd/websocketpp) 
* [RFC6455 @ IETF (Internet Engineering Task Force)](https://tools.ietf.org/html/rfc6455)
* [WebSocket @ Wikipedia](https://en.wikipedia.org/wiki/WebSocket)
* [Boost.Asio](https://www.boost.org/doc/libs/1_67_0/doc/html/boost_asio.html)
* [Boost.Asio Dependencies](https://www.boost.org/doc/libs/1_67_0/doc/html/boost_asio/using.html#boost_asio.using.dependencies)
* [Boost.System](https://www.boost.org/doc/libs/1_67_0/libs/system/doc/index.html)

# Notes<a name="notes"></a>

* Write alternative post where we use Boost.Asio standalone with C++11 compiler?
* https://think-async.com/Asio/AsioStandalone.html

# Debugging<a name="debugging"></a>

Install [libstdc++](https://gcc.gnu.org/onlinedocs/libstdc++/) debug symbols in Ubuntu 18.04:
{% highlight plaintext %}
sudo apt install libstdc++6-7-dbg
{% endhighlight %}

Build `websocketpp` unit tests:

{% highlight plaintext %}
$ cd ~/git/websocketpp/build
$ cmake -DBUILD_TESTS=TRUE -DBOOST_ROOT=/home/jmossberg/lib/boost/boost_1_67_0 ..
$ make
$ ctest -T test
{% endhighlight %}

# Running unit tests<a name="running-unit-tests"></a>

{% highlight plaintext %}
./bootstrap.sh --with-libraries=system,thread,test --prefix=$HOME/lib/boost/boost_1_67_0
{% endhighlight %}
