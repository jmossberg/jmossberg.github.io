---
layout: post
title:  "Travel report to Meeting C++ 2016"
date:   2016-12-03 22:18:00
categories: posts
---

### Train trip to Berlin

[Meeting C++ 2016](http://meetingcpp.com/index.php/mcpp2016.html) took place at Andels Hotel in Berlin at 18th and 19th November. This was my first C++ conference so it was exciting to leave Gothenburg on the train to Copenhagen early in the morning of the 16th. 

<img src="/assets/meeting-cpp-2016/train-start.jpg" height="350"> <img src="/assets/meeting-cpp-2016/train-gothenburg-berlin.png" height="350"> 

After 12 hours and one boat trip later I arrived in Berlin. We only had a small delay at the end due to the fact that Barack Obama drove through Berlin at the same time we were arriving.

<img src="/assets/meeting-cpp-2016/boat.jpg" height="350"> <img src="/assets/meeting-cpp-2016/andel.jpg" height="350">

### Conclusion

Below is a summary of the talks I listened to but let's start with my conclusion. I enjoyed Meeting C++ 2016 and I will definitely consider coming back next year. Some of the talks were above my current knowledge level but I like getting this fast overview of what is happening in the community.

The conference gave me a lot of ideas for C++ topics that I want to look into more deeply. It feels like C++ is gaining momentum with the rapid standardization work, compilers being updated fast and the newfound interest in performance. But of course a C++ conference is a bit biased when it comes to measuring the success of different programming languages. 

One thing that I missed from the conference was coding dojos. It would be nice to take a break from the listening once in a while and do a kata with my fellow conference participants for let's say an hour. There could even be a couple of coding dojos with different themes.

Jens Weller who is the organizer of the conference informed us that he plans to make it a three-day conference 2017. Jens also showed us the 10 countries with largest number of conference participants during 2016.

<img src="/assets/meeting-cpp-2016/top-ten-countries.jpg" width="650">

### YouTube

Jens Weller is making the talks from Meeting C++ 2016 available on YouTube:

* Meeting C++ has a YouTube page: [https://www.youtube.com/user/MeetingCPP](https://www.youtube.com/user/MeetingCPP)
* There is also a playlist with all releases videos from Meeting C++ 2016: [https://www.youtube.com/watch?v=xAfveJj9dUA&list=PLRyNF2Y6sca06lulacjysyu8RIwfKgYoY](https://www.youtube.com/watch?v=xAfveJj9dUA&list=PLRyNF2Y6sca06lulacjysyu8RIwfKgYoY) 

### Workshop day

It's a two-day conference with an optional workshop day. I attended the workshop day, which focused on **multi threading** in C++11. It was nice to have one practical day where I could practice some coding. The workshop was hosted by Rainer Grimm.

The day was wrapped up by a talk about **C++ coroutines** delivered by James McNellis who works at Microsoft. I have not heard about coroutines before but they are functions that can be suspended and resumed at certain locations in the code. In my understanding we can use coroutines to perform other tasks while waiting for a blocking call in a function. 

### Day 1 (Friday)

The opening keynote of the conference was delivered by [Bjarne Stroustrup](http://www.stroustrup.com/). He created C++ back in the 1970s and he is still very much involved in the standardization work now that C++ is an ISO standard.

<img src="/assets/meeting-cpp-2016/opening-keynote.jpg" width="450">

Some take aways from Bjarne's talk:

* C++ provides low level hardware control while at the same time offering strong abstraction mechanisms (e.g. classes, templates). This is one of the main selling points for C++.
* Another goal of C++ is to implement [zero-overhead abstraction](http://www.stroustrup.com/abstraction-and-machine.pdf). In my understanding this means that if you choose **not** to make use of a specific feature you should not pay any performance cost for it. It also means that if you **do** choose to make use of a feature the generated machine code should be no less efficient than what a human could write.
* C++ must excel at resource management (memory, file handles, mutexes, etc.). C++ handles this through [Resource acquisition is initialization (RAII)](https://en.wikipedia.org/wiki/Resource_acquisition_is_initialization).
* The evolution speed of the language has increased notably starting with the release of C++11. We now have C++14 and we are looking forward to C++17 and C++20. The release prior to C++11 was C++98. C++11 was a big release that introduced many new features, e.g. lambdas, concurrency, move semantics, etc.
* C++17 will include some minor improvements but bigger changes have been postponed to C++20 it seems. Examples are **modules** and **concepts**. Modules will allow programmers to make ´import´ instead of ´#include´. Concepts is a way to put constraints on what type of types a template class or template function accepts if I understand correctly. This will provide developers with better error messages if providing the template with an incorrect type.

On the Friday I managed to listen to three more talks after the opening keynote:

#### SG14: The story so far

The presenter of this talk was Guy Davidson who is Coding Manager at Creative Assembly. Creative Assembly is a British game developer. SG14 is a study group within the [ISO C++ committee](https://isocpp.org/std/the-committee) focused on Game Development & Low Latency.  

<img src="/assets/meeting-cpp-2016/wg21-structure.png" height="350">

Guy presented some typical constraints such as CPU and RAM game developers face when using C++.

He also gave some examples of current initiatives from the study group:

* Ring
* Flat map and set
* Uninitialized memory algorithms

Links:

* [SG14 Google Group](https://groups.google.com/a/isocpp.org/forum/#!forum/sg14)
* [SG14 @ Github](https://github.com/WG21-SG14/SG14)
* [Electronic Arts Standard Template Library (EASTL)](https://github.com/electronicarts/EASTL)

#### Want fast C++? Know your hardware!

Timur Doumler gave a nice talk about writing fast C++. He provided several code examples where he showed how the interaction between the layer 1, 2 & 3 caches affects the code execution speeds.

#### Implementing a web game in C++14

<img src="/assets/meeting-cpp-2016/web-game.jpg" width="650">

Kris Josiak introduced me to web game development using C++14. The idea is to use a source-to-source compiler called [Emscripten](https://en.wikipedia.org/wiki/Emscripten) that compiles C++ code into Javascript, or actually a subset of Javascript called [asm.js](https://en.wikipedia.org/wiki/Asm.js). The generated asm.js code can be run in a web browser such as Firefox. An alternative to asm.js is to compile the C++ code into [WebAssembly](https://en.wikipedia.org/wiki/WebAssembly). WebAssembly executes faster than asm.js in the browser, but browser support is still limited.

Kris also based his game development on the following libraries:

* [range-v3](https://github.com/ericniebler/range-v3)
* [Boost.DI - Dependency Injection](https://github.com/boost-experimental/di)
* [Boost.SML - State Machine Language](http://boost-experimental.github.io/sml/)

#### The beast is back

<img src="/assets/meeting-cpp-2016/beast-is-back.jpg" width="650">

I ended day one by listening to Jon Kalb. Basically he gave a pep talk to the C++ community why C++ is currently gaining momentum. The first decade of the millennium was a lost decade for C++. The first ISO standard was released in 1998 and the tool developers needed several years to catch up. This fact made the standardization work to grind to a halt. Another factor in play was that many people thought performance was not such an important issue anymore given the speed of new CPUs. With this reasoning it was ok to run e.g. Java instead of C++.

However things have improved for C++ in the second decade of the millennium. People have realized that performance still matters. One example is new expensive data centers where the investors want to make efficient use of all the installed CPUs. Another example is the desire to maximize the performance from handheld devices. Also the standardization work is now ploughing ahead more quickly and the tool developers have caught up and can implement new features very soon after they have been added to the standard.

### Day 2 (Saturday)

#### SYCL building blocks for C++ libraries

I started out day 2 listening to Gordon Brown speaking about SYCL. My understanding is that SYCL is an abstraction layer on top of OpenCL. Open Computing Language (OpenCL) is a "*framework for wiring programs that execute across heterogeneous platforms consisting of central processing units (CPUs), graphics processing units (GPUs), digital signal processors (DSPs), field-programmable gate arrays (FPGAs) and other processors or hardware accelerators*" - Wikipedia. I think the abbreviation SYCL stands for something like Single-source C++ for OpenCL.

Links:

* [Introduction to SYCL](https://www.codeplay.com/portal/introduction-to-sycl)
* [C++ Single-source Heterogeneous Programming for OpenCL](https://www.khronos.org/sycl)
* [OpenCL](https://en.wikipedia.org/wiki/OpenCL)

#### Asynchronous IO with Boost.Asio

<img src="/assets/meeting-cpp-2016/boost-asio.jpg" width="650">

Michael Caisse introduced us to the Boost.Asio library. Asio stands for Asynchronous Input Output. It is a library to help manage e.g. TCP sockets without having to manually setup of a bunch of threads. Threads are usually needed when dealing with sockets since many of the system calls will [block](http://beej.us/guide/bgnet/output/html/singlepage/bgnet.html#blocking) while waiting for response.

Links:

* [Boost.Asio Documentation](http://www.boost.org/doc/libs/1_60_0/doc/html/boost_asio.html)


#### C++17 and Beyond, Mark Isaacson

<img src="/assets/meeting-cpp-2016/cpp-17-beyond.jpg" width="650">

In this talk Mark Isaacson zoomed in on some new features in C++17:

* sd::string:view
* operator dot
* constexpr_if

#### C++ Metaprogramming: Evolution and Future Directions (closing keynote)

<img src="/assets/meeting-cpp-2016/closing-keynote-metaprogramming.jpg" width="650">

Louis Dionne gave us the history of metaprogramming in C++. In my understanding metaprogramming is code that can be evaluated during compile time. One goal with this technique is to make use of all facts known at compile time to make the run time code more efficient. After talking about the history Louis went on to show an event driven system written with Boost.Hana. Boost.Hana is library for C++ metaprogramming. Louis is the developer behind Boost.Hana. Finally Louis talked about what kind of metaprogramming that C++17, C++20 and beyond will allow for. 
