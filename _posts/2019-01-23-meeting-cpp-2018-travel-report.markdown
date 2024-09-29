---
layout: post
title:  "Travel report to Meeting C++ 2018"
date:   2019-01-23 01:00:00
categories: posts
---

### Contents<a name="contents"></a>

* [Introduction](#introduction)
* [Workshop (Wednesday)](#workshop-wednesday)
* [Day 1 (Thursday)](#day-1-thursday)
    * [Opening Keynote: The Next Big Thing (Andrei Alexandrescu)](#the-next-big-thing-andrei-alexandrescu)
    * [A Little Order! (Fred Tingaud)](#a-little-order!-fred-tingaud)
    * [Data-oriented design in practice (Stoyan Nikolov)](#data-oriented-design-in-practice-stoyan-nikolov)
    * [std::variant and the power of pattern matching (Nikolai Wuttke)](#std::variant-and-the-power-of-pattern-matching-nikolai-wuttke)
    * [Taming Dynamic Memory - An Introduction to Custom Allocators (Andreas Weis)](#taming-dynamic-memory---an-introduction-to-custom-allocators-andreas-weis)
* [Day 2 (Friday)](#day-2-friday)
    * [Middle Keynote: The Truth of a Procedure (Lisa Lippincott)](#keynote:-the-truth-of-a-procedure-lisa-lippincott)
    * [Benchmarking C++ From video games to algorithmic trading (Alexander Radchenko)](#benchmarking-c++-from-video-games-to-algorithmic-trading-alexander-radchenko)
    * [More Modern CMake - Working with CMake 3.12 and later (Deniz Bahadir)](#more-modern-cmake---working-with-cmake-312-and-later-deniz-bahadir)
    * [Higher order functions for ordinary C++ developers (Björn Fahller)](#higher-order-functions-for-ordinary-c++-developers-bjorn-fahller)
    * [C++ Concepts and Ranges - How to use them? (Mateusz Pusz)](#c++-concepts-and-ranges---how-to-use-them?-mateusz-pusz)
* [Day 3 (Saturday)](#day-3-saturday)
    * [Initialisation in modern C++ (Timur Doumler)](#initialisation-in-modern-c++-timur-doumler)
    * [Compile Time Regular Expressions (Hana Dusíková)](#compile-time-regular-expressions-hana-dusíková)
    * [Policy-based design in C++20 (Goran Arandjelovic)](#policy-based-design-in-c++20-goran-arandjelovic)
    * [Lightning talks](#lightning-talks)
    * [Closing Keynote: 50 Shades of C++ (Nicolai Josuttis)](#keynote:-50-shades-of-c++-nicolai-josuttis)

### Introduction<a name="introduction"></a>

[Meeting C++](https://meetingcpp.com/) is a yearly conference taking place in Berlin. This year, i.e. 2018, it took place on 15th to 17th of November. It is organized by Jens Weller. As far as I know it is the biggest C++ conference in Europe. 650+ people attended this year. It was the third time I attended the conference. I took the train as usual starting early in the morning from Gothenburg and arriving in Berlin around 19 o'clock after switching trains in Copenhagen and Hamburg.

[Daniel Eriksson](https://twitter.com/shaddack) and Dave Brown from Gothenburg also attended the conference. We are are all active in the [Gothenburg C++ Meetup](https://www.meetup.com/gbgcpp).

The venue of the conference is [Vienna House Andels Hotel](https://www.viennahouse.com/en/andels-berlin/the-hotel/overview.html). I recommend staying in a room in the same hotel to save on travelling time in the morning and afternoon. I think most people attending the conference do this. The hotel feels quite new and the rooms are nice. I especially like that the air condition works properly since I have had bad experiences with too warm rooms in other hotels.

<img src="/assets/meeting-cpp-2018/2018-11-13-train-gothenburg-berlin.png" height="300">
<img src="/assets/meeting-cpp-2018/2018-11-13-copenhagen-train-station.jpg" height="300">
<img src="/assets/meeting-cpp-2018/2018-11-18-andels-hotel.jpg" height="300">

The main room of the conference is located in the basement of the hotel. All three keynote presentations took place there. The keynotes were spread out with one each day of the conference. No other presentations took place during the keynotes. The conference has four tracks. There is also a fifth special track where attendees can meet and discuss various subjects, e.g. there is one slot for user group organizers.

A lot of the talks have a strong template focus as I have already noted previous years. I had improved my [template metaprogramming](https://en.wikipedia.org/wiki/Template_metaprogramming) knowledge somewhat prior to this years conference which made it easier to follow the talks. I also attended the workshop day arranged by [Nicolai Josuttis](https://twitter.com/nicojosuttis) prior to the conference itself to boost my template knowledge a little bit more. The theme of the workshop was Modern C++ Template Programming. 

I listened to 14 talks all in all not counting lightning talks. I also joined the Conan C++ quiz on the Thursday evening. I think it was a lot of fun even though we had great potential for improvement in my team with regards to the number of points we managed to acquire.

Below are my notes from the talks I attended.

Links:
* [MeetingCpp 2018](https://meetingcpp.com/2018/)
* [MeetingCpp @ YouTube](https://www.youtube.com/user/MeetingCPP)
* [MeetingCpp @ Twitter](https://twitter.com/meetingcpp)

### Workshop (Wednesday)<a name="workshop-wednesday"></a>

<img src="/assets/meeting-cpp-2018/2018-11-14-template-workshop.jpg">

[Nicolai Josuttis](https://twitter.com/nicojosuttis) packed a full day talking about templates. I learned more about two-phase translation, value categories, char array decaying and Class Template Argument Deduction (CTAD) among other things. He also talked about different ways to organize template code and lots of other stuff. 

<blockquote class="twitter-tweet" data-lang="sv"><p lang="en" dir="ltr">I finished one full day of templates workshop with <a href="https://twitter.com/NicoJosuttis?ref_src=twsrc%5Etfw">@NicoJosuttis</a> at <a href="https://twitter.com/meetingcpp?ref_src=twsrc%5Etfw">@meetingcpp</a>. 😅 A lot of information but I think the area is becoming more clear for me. 👍 I still need to learn more about what solutions make sense in my typical use cases. <a href="https://t.co/SSOGyiTuCR">pic.twitter.com/SSOGyiTuCR</a></p>&mdash; Jacob Mossberg (@jcmossberg) <a href="https://twitter.com/jcmossberg/status/1062777534499250177?ref_src=twsrc%5Etfw">14 november 2018</a></blockquote>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>


### Day 1 (Thursday)<a name="day-1-thursday"></a>

#### Opening Keynote: The Next Big Thing (Andrei Alexandrescu)<a name="the-next-big-thing-andrei-alexandrescu"></a>

<img src="/assets/meeting-cpp-2018/2018-11-15-keynote-the-next-big-thing-andrei-alexandrescu.jpg">

[Andrei Alexandrescu](https://twitter.com/incomputable) talked about Design by introspection. He talked about the C++ statement `if constexpr`. He thinks that the potential use cases for `if constexpr` would be more compelling if it would not introduce a scope. He would like to use `if constexpr` to select between different designs based on compile time conditions. Andrei also mentioned Policy based design. 

I recently noted a [blog post](https://brevzin.github.io/c++/2019/01/15/if-constexpr-isnt-broken/) by [Barry Revzin](https://twitter.com/BarryRevzin) where he writes about the talk by Andrei.

Links:
* [D Programming Language](https://dlang.org/)
* [D Programming Language (Wikipedia)](https://en.wikipedia.org/wiki/D_(programming_language))
* [Policy based design](https://en.wikipedia.org/wiki/Modern_C%2B%2B_Design#Policy-based_design)

#### A Little Order! (Fred Tingaud)<a name="a-little-order!-fred-tingaud"></a>

<img src="/assets/meeting-cpp-2018/2018-11-15-a-little-order-stl-sorting-algorithms-fred-tingaud.jpg">

[Fred Tingaud](https://twitter.com/FredTingaudDev) talked about STL sorting algorithms.

Algorithms:
* [std::sort](https://en.cppreference.com/w/cpp/algorithm/sort)
* [std::partial_sort](https://en.cppreference.com/w/cpp/algorithm/partial_sort)
* [std::stable_sort](https://en.cppreference.com/w/cpp/algorithm/stable_sort)
* [std::nth_element](https://en.cppreference.com/w/cpp/algorithm/nth_element)

Links:
* [quick-bench.com](http://quick-bench.com/)
* [Google Benchmark](https://github.com/google/benchmark)

#### Data-oriented design in practice (Stoyan Nikolov)<a name="data-oriented-design-in-practice-stoyan-nikolov"></a>

<img src="/assets/meeting-cpp-2018/2018-11-15-data-oriented-design-in-practice-stoyan-nikolov.jpg">

[Stoyan Nikolov](https://twitter.com/stoyannk) talked about data-oriented design. He said that the basic issue with Object Oriented Programming is that data is combined with operations which means that heterogeneous data is brought together. In data-oriented design data and operations are kept separate. The data is organized according to its use. Functions are used to work on the data. Data oriented design has mostly been used in games. Main selling point in my understanding is performance. The data is laid out in such a way in memory that the CPU intensive operations goes quicker.

Stoyan compared the Chromium browser engine (object oriented design) with the Hummingbird browser engine (data oriented design).

Potential downsides of data-oriented design:
* Correct data separation is hard
* Quick modification is difficult

Links:
* [https://stoyannk.wordpress.com/](https://stoyannk.wordpress.com/)
* [Data-oriented design (Wikipedia)](https://en.wikipedia.org/wiki/Data-oriented_design)
* [CppCon 2014: Mike Acton "Data-Oriented Design and C++"](https://www.youtube.com/watch?v=rX0ItVEVjHc)

#### std::variant and the power of pattern matching (Nikolai Wuttke)<a name="std::variant-and-the-power-of-pattern-matching-nikolai-wuttke"></a>

<img src="/assets/meeting-cpp-2018/2018-11-15-std-variant-and-the-power-of-pattern-matching.jpg">

[Nikolai Wuttke](https://twitter.com/lethal_guitar) talked about a programming style based on pattern matching using [std::variant](https://en.cppreference.com/w/cpp/utility/variant) introduced in C++17. Nikolai compared different ways to handle states in a small example Space Game application. The traditional approach is to use an enum combined with state variables. Nikolai showed a different approach where possible states are stored in a std::variant and he makes use of [std::visit](https://en.cppreference.com/w/cpp/utility/variant/visit) to apply correct operation depending on current state. He went further and combined std::variant, std::visit with the experimental std::overload to write a match function to get something that is close to the native pattern matching available in Haskell and Rust.

Links:
* [std::variant and the power of pattern matching (slides)](https://github.com/lethal-guitar/VariantTalk/blob/master/slides/PatternMatching.pdf)
* [https://github.com/lethal-guitar/VariantTalk](https://github.com/lethal-guitar/VariantTalk)
* [C++ generic overload function (Revision 3), P0051R3, std::overload](http://open-std.org/JTC1/SC22/WG21/docs/papers/2018/p0051r3.pdf)


#### Taming Dynamic Memory - An Introduction to Custom Allocators (Andreas Weis)<a name="taming-dynamic-memory---an-introduction-to-custom-allocators-andreas-weis"></a>

<img src="/assets/meeting-cpp-2018/2018-11-15-taming-dynamic-memory-an-introduction-to-custom-allocation-andreas-weis.jpg">

[Andreas Weis](https://twitter.com/derghulbus) talked about creating custom allocators for STL containers. He mentioned potential problems with the default allocator:
* Complex runtime behavior - What is the max memory usage for example?
* Shared global state - the single global allocator is a potential bottleneck.

He argued that not only performance is important but also whether the allocator acts in a predictable way. Andreas went on to discuss different types of allocators:
* Monotonic allocator
* Monotonic allocator with reclamation
* Stack allocator
* Monotonic allocator with extensions
* Pool allocator
* Multipool allocator

Links:
* [Allocator (C++) - Wikipedia](https://en.wikipedia.org/wiki/Allocator_(C%2B%2B))
* [std::allocator - default allocator](https://en.cppreference.com/w/cpp/memory/allocator)

### Day 2 (Friday)<a name="day-2-friday"></a>

#### Middle Keynote: The Truth of a Procedure (Lisa Lippincott)<a name="keynote:-the-truth-of-a-procedure-lisa-lippincott"></a>

<img src="/assets/meeting-cpp-2018/2018-11-16-keynote-truth-of-a-procedure-lisa-lippincott.jpg">

Lisa Lippincott talked about how to apply formal reasoning on how a program works. She also discussed checkable proofs. Lisa presented the concepts using examples that she called "game of truth", "game of necessity" and "game of proof".

<img src="/assets/meeting-cpp-2018/2018-11-16-keynote-truth-of-a-procedure-lisa-lippincott-game-of-truth.jpg">

#### Benchmarking C++ From video games to algorithmic trading (Alexander Radchenko)<a name="benchmarking-c++-from-video-games-to-algorithmic-trading-alexander-radchenko"></a>

<img src="/assets/meeting-cpp-2018/2018-11-16-benchmarking-cpp-from-video-games-to-algorithmic-trading-alexander-radchenko.jpg">

[Alexander Radchenko](https://twitter.com/phejet) talked about benchmarking C++ programs. He focused on games and high frequency trading applications.

Game companies develop custom profilers to analyze whole game sessions but also single frames. Network traffic is recorded to replay games. This can be used to reproduce performance measurements.

Throughput is most important in games whereas high frequency trading applications focus on low latency.

Tracing can be implemented with hardware timestamps or software timestamps. Hardware timestamps cost a few nanoseconds. Software timestamps cost more but are still cheap. [std::chrono::high_resolution_clock](https://en.cppreference.com/w/cpp/chrono/high_resolution_clock) can be used to create time stamps.

Alexander makes use of [Jupyter notebooks](https://jupyter.org/) to analyze and visualize performance measurements.

His main takeaways:
* Important to have reproducible way to measure performance
* Visualising performance measurement helps a lot
* Always look at high level picture of the program when optimizing code

Links:
* [https://github.com/phejet/benchmarkingcpp_games_trading](https://github.com/phejet/benchmarkingcpp_games_trading)

#### More Modern CMake - Working with CMake 3.12 and later (Deniz Bahadir)<a name="more-modern-cmake---working-with-cmake-312-and-later-deniz-bahadir"></a>

<img src="/assets/meeting-cpp-2018/2018-11-16-more-modern-cmake-working-with-cmake-3-12-and-later-deniz-bahadir.jpg">

[Deniz Bahadir](https://github.com/Bagira80) started by defining traditional CMake, modern CMake and more modern CMake:
* Traditional CMake (version < 3.0)
* Modern CMake (version => 3.0)
* More Modern CMake (version =>3.12)

Deniz went on to explain that CMake keep tracks of both build requirements and usage requirements. Example of build requirements are source files, compiler options, linker options and include search paths.

In traditional CMake we keep track of usage requirements with variables. In modern CMake the build targets keep track of the usage requirements themselves. In more modern CMake this new way of working also includes object library build targets.

With more modern CMake one should create a target first without sources and later add build- and usage requirements using `target_...` commands. A target can be an application or a library. Below is an [example](https://github.com/Bagira80/More-Modern-CMake/blob/master/example-3.12/app/CMakeLists.txt#L10-L15) from Deniz GitHub account where the `target_link_libraries` command is used to set `MyCalc::basicmath` and `Boost::program_options` as build requirements for the `FreeCalculator` executable target: 

{% highlight plaintext %}
// Freely available calculator app.
add_executable( FreeCalculator )
target_sources( FreeCalculator PRIVATE "src/main.cpp" )
target_link_libraries( FreeCalculator
    PRIVATE MyCalc::basicmath
            Boost::program_options )
{% endhighlight %}

PRIVATE adds a build requirement for the target whereas INTERFACE adds a usage requirement. PUBLIC means that the requirement is both a build requirement and a usage requirement.  The following [example](https://github.com/Bagira80/More-Modern-CMake/blob/master/example-3.12/library/CMakeLists.txt#L10-L17) from Deniz GitHub account makes use of all three for the target `basicmath_ObjLib`.

{% highlight plaintext %}
// An OBJECT-library, used to only compile common sources once
// which are used in both math-libraries.
add_library( basicmath_ObjLib OBJECT )
target_sources( basicmath_ObjLib
    PRIVATE   "src/BasicMath.cpp"
              "src/HeavyMath.cpp"  # Takes loooooong to compile!
    PUBLIC    "${CMAKE_CURRENT_SOURCE_DIR}/include/Math.h"
    INTERFACE "${CMAKE_CURRENT_SOURCE_DIR}/include/MathAPI.h" )
{% endhighlight %}

Links:
* [https://github.com/Bagira80/More-Modern-CMake](https://github.com/Bagira80/More-Modern-CMake)

#### Higher order functions for ordinary C++ developers (Björn Fahller)<a name="higher-order-functions-for-ordinary-c++-developers-bjorn-fahller"></a>

<img src="/assets/meeting-cpp-2018/2018-11-16-higher-order-functions-for-ordinary-cpp-developers-bjorn-fahller.jpg">

[Björn Fahller](https://twitter.com/bjorn_fahller) explained that a higher order function takes other functions as arguments and return functions.

One take away from Björn is to use the `auto` keyword to create functions that returns lambdas. Example:
{% highlight plaintext %}
template <typename T>
auto equals(T key)
{
    return  [key](auto const& x){ return x == key; };
}
{% endhighlight %}
std::function can also be used but is not quite as generic.

Björn has written a library named [lift](https://github.com/rollbear/lift) that contains a number of higher order functions.

[Simon Brand](https://twitter.com/tartanllama) has written a [variant](https://github.com/TartanLlama/optional) of [std::optional](https://en.cppreference.com/w/cpp/utility/optional) that allows functional style syntax and removed the need for many conditionals.

Links:
* [Boost.HOF](https://www.boost.org/doc/libs/1_68_0/libs/hof)
* [lift](https://github.com/rollbear/lift) by Björn Fahller
* [optional](https://github.com/TartanLlama/optional) by Simon Brand
* [https://optional.tartanllama.xyz](https://optional.tartanllama.xyz)
* [Standards proposal P0798r0: Monadic operations for std::optional](http://open-std.org/JTC1/SC22/WG21/docs/papers/2017/p0798r0.html)

#### C++ Concepts and Ranges - How to use them? (Mateusz Pusz)<a name="c++-concepts-and-ranges---how-to-use-them?-mateusz-pusz"></a>

<img src="/assets/meeting-cpp-2018/2018-11-16-cpp-concepts-and-ranges-mateusz-pusz.jpg">

Mateusz Pusz talked about concepts and ranges. Mateusz showed the concept syntax agreed on at Toronto 2017.

Define a concept name Sortable
{% highlight plaintext %}
template<class T>
concept Sortable { /* .... */ }
{% endhighlight %}

Use a concept in a template function
{% highlight plaintext %}
template<typename T>
  requires Sortable<T>
void sort(T&);
{% endhighlight %}

There is also a shorthand notation
{% highlight plaintext %}
template<Sortable T>
void sort(T&);
{% endhighlight %}

He argues that one shall use algorithms from std::ranges instead of from namespace std.

Links:
* [Range-V3](https://github.com/ericniebler/range-v3)
* [CMCSTL2](https://github.com/CaseyCarter/cmcstl2)

### Day 3 (Saturday)<a name="day-3-saturday"></a>

#### Initialisation in modern C++ (Timur Doumler)<a name="initialisation-in-modern-c++-timur-doumler"></a>

<img src="/assets/meeting-cpp-2018/2018-11-17-initialisation-in-modern-cpp-timur-doumler.jpg">

[Timur Doumler](https://twitter.com/timur_audio) talked about different ways to do initialisation. He started with initialisation in C. He went on and described what other initialisation alternatives that were added in C++98, C++11, C++14 and C++17.

The initialisation recommendations from Timur for C++17 are:
* Use `auto`
* Use `= value` for simple value types (e.g. int)
* Use `= {args}` for aggregate-init, `std::initializer_list`, DMI ctors
* Use `{}` for value-init
* Use `(args)` to call constructors that take arguments

Timur has created a handy table showing initialisation alternatives in C++17. The table is available in a [tweet](https://twitter.com/timur_audio/status/1063738718576656384) from Timur.

#### Compile Time Regular Expressions (Hana Dusíková)<a name="compile-time-regular-expressions-hana-dusíková"></a>

<img src="/assets/meeting-cpp-2018/2018-11-17-compile-time-regular-expressions-hana-dusikova.jpg">

[Hana Dusíková](https://twitter.com/hankadusikova) talked about a [Compile Time Regular Expressions (CTRE)](https://github.com/hanickadot/compile-time-regular-expressions) library that she has created.

Hana has compared runtime matching performance of CTRE with other regular expression libraries such as gnu-egrep, PCRE2, std::regex, RE2 and boost. CTRE has the best runtime matching performance of those. The compile time of CTRE is slower than gnu-egrep, PCRE2 and boost but the difference is not big.

Links:
* [https://compile-time.re](https://compile-time.re)
* [https://github.com/hanickadot/compile-time-regular-expressions](https://github.com/hanickadot/compile-time-regular-expressions)

#### Policy-based design in C++20 (Goran Arandjelovic)<a name="policy-based-design-in-c++20-goran-arandjelovic"></a>

<img src="/assets/meeting-cpp-2018/2018-11-17-policy-based-design-in-cpp20-goran-arandjelovic.jpg">

Goran Arandjelovic talked about Policy-based design in C++20.

Links:
* [YouTube: Value semantics and concepts-based polymorphism](https://youtu.be/_BpMYeUFXv8)
* Wikipedia on [Policy-based Design](https://en.wikipedia.org/wiki/Modern_C%2B%2B_Design#Policy-based_design)

#### Lightning talks<a name="lightning-talks"></a>

<img src="/assets/meeting-cpp-2018/2018-11-17-brutalist-web-design.jpg">

Jens Weller held a lightning talk among others. He talked about the principles behind so called brutalist web design.

#### Closing Keynote: 50 Shades of C++ (Nicolai Josuttis)<a name="keynote:-50-shades-of-c++-nicolai-josuttis"></a>

[Nicolai Josuttis](https://twitter.com/nicojosuttis) delivered the closing keynote. One of his messages was that there no single C++ style.

He talked about different ways to do initialization. Nicolai also talked about [Almost Always Auto](https://herbsutter.com/2013/08/12/gotw-94-solution-aaa-style-almost-always-auto/).

<img src="/assets/meeting-cpp-2018/2018-11-17-closing-keynote-50-shades-of-cpp-nicolai-josuttis.jpg">

He designed a class that started out simple with a few setters and getters. He than gradually showed how it became quite complex if you want to optimize the setters and getters with respect to whether one should use copy by value, copy by reference or copy by value with move semantics.

Nicolai also discussed the standardisation process in the C++ committee where he mentioned the [Virginia Satir Change Model](http://www.satirworkshops.com/files/satirchangemodel.pdf) among other things.

Nicolai also explained how value categories have evolved starting with K&R C and ANSI and going to C++11 and C++17:

Value categories in C++11 can be thought of as:
* LValue is "everything that ha a name and string literals"
* PRValue are "temporaries and other literals"
* XValue is a "value from std::move()"

The [C++ draft](http://eel.is/c++draft/basic.lval) currently (2019-01-17) has the following definitions:

> A glvalue is an expression whose evaluation determines the identity of an object,
> bit-field, or function.
> 
> A prvalue is an expression whose evaluation initializes an object or a bit-field,
> or computes the value of an operand of an operator, as specified by the context
> in which it appears.
> 
> An xvalue is a glvalue that denotes an object or bit-field whose resources can be
> reused (usually because it is near the end of its lifetime).

Links:
* [C++ draft: 7.2.1 Value category](http://eel.is/c++draft/basic.lval)
* [Virginia Satir Change Model](http://www.satirworkshops.com/files/satirchangemodel.pdf)
* [abseil.io](abseil.io)
* [medium.com: Value Categories in C++17](https://medium.com/@barryrevzin/value-categories-in-c-17-f56ae54bccbe)
