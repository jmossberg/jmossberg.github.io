---
layout: post
title:  "Travel report to Meeting C++ 2017"
date:   2018-09-30 01:00:00
categories: posts
---

## Contents<a name="contents"></a>

* [Introduction](#introduction)
* [Meeting C++ links](#meeting-c++-links)
* [Day 1 (Thursday)](#day-1-thursday)
    * [Opening keynote: Better Code - Human interface (Sean Parent)](#opening-keynote:-better-code---human-interface-sean-parent)
    * [Practical C++17 (Jason Turner)](#practical-c++17-jason-turner)
    * [Strong types](#strong-types)
    * [Modern C++ testing with Catch2](#modern-c++-testing-with-catch2)
    * [Beyond the compiler: Advanced tools for better productivity](#beyond-the-compiler:-advanced-tools-for-better-productivity)
* [Day 2](#day-2)
    * [It's complicated](#its-complicated)
    * [An inspiring introduction to template metaprogramming](#an-inspiring-introduction-to-template-metaprogramming)
    * [Concepts Driven Design](#concepts-driven-design)
    * [Declarative Thinking, Declarative Practice](#declarative-thinking,-declarative-practice)
    * [Discussion among user group organisers](#discussion-among-user-group-organisers)
* [Day 3 (Saturday)](#day-3-saturday)
    * [Lightning talks](#lightning-talks)
        * [function\_ref (a non-owning reference to a Callable)](#function\_ref-a-non-owning-reference-to-a-callable)
        * [A variant of recursive descent parsing](#a-variant-of-recursive-descent-parsing)
        * [A Very Quick View Into a Compiler](#a-very-quick-view-into-a-compiler)
        * [Multi dimensional arrays in C++](#multi-dimensional-arrays-in-c++)
        * [A short story about configuration file formats](#a-short-story-about-configuration-file-formats)
    * [The hidden rules of world-class C++ code](#the-hidden-rules-of-world-class-c++-code)
    * [Extra lightning talks](#extra-lightning-talks)
        * [Polymorphic tasks template in ten (minutes)](#polymorphic-tasks-template-in-ten-minutes)
        * [5 things I figured out while I was supposed to be dying](#5-things-i-figured-out-while-i-was-supposed-to-be-dying)
        * [Diversity and inclusion](#diversity-and-inclusion)
        * [Rainer Grimm](#rainer-grimm)
        * [Composable command line parser in Catch2](#composable-command-line-parser-in-catch2)
        * [Programming in a different domain](#programming-in-a-different-domain)
    * [Closing keynote: What can C++ do for embedded and what can embedded do for C++?](#closing-keynote:-what-can-c++-do-for-embedded-and-what-can-embedded-do-for-c++?)

### Introduction<a name="introduction"></a>

[Meeting C++ 2017](http://meetingcpp.com/index.php/mcpp2017.html) took place at Andels Hotel in Berlin at 9th to 11th November. The conference is organized by Jens Weller. I think it has around 600 participants and it has been around since 2012. 

<img src="/assets/meeting-cpp-2017/jacob-front-hotel.jpg" height="350">

This was my second time at the conference. This time I went together with [Daniel Eriksson](https://twitter.com/shaddack). Me and Daniel are two of the four co-organizers of the [Gothenburg C++ Meetup](https://www.meetup.com/gbgcpp).

I listened to all three keynotes, 8 talks and 12 lightning talks (including the bonus ones at the end). I also participated in the discussion session for user group organizers on the Friday and in the discussion session for embedded on the Saturday.

As I noticed already last year a lot of the talks I listened to involved [template metaprogramming](https://en.wikipedia.org/wiki/Template_metaprogramming) in one way or another. As someone coming from pure C and embedded this can feel tricky to say the least. I'm eager to put in some more learning time into this and see how I can make use of it.

[Guy Davidson](https://www.twitter.com/hatcat01) held a lightning talk about diversity and inclusion before the end keynote on the Saturday. I liked that he brought up this topic and I will try to follow his advice and also continously evaluate my own behaviour in order to support this issue.

A big thanks to Jens Weller and all the speakers for making this conference possible!

Below is a list of the talks I listened to.

### Meeting C++ links<a name="meeting-c++-links"></a>

* Homepage: [http://meetingcpp.com](http://meetingcpp.com)
* Twitter: [https://twitter.com/meetingcpp](https://twitter.com/meetingcpp)
* YouTube: [https://www.youtube.com/user/MeetingCPP](https://www.youtube.com/user/MeetingCPP)

### Day 1 (Thursday)<a name="day-1-thursday"></a>

#### Opening keynote: Better Code - Human interface (Sean Parent)<a name="opening-keynote:-better-code---human-interface-sean-parent"></a>

The opening keynote of the conference was delivered by [Sean Parent](https://twitter.com/seanparent). Sean currently works on Photoshop at Adobe. Sean talked aboth the relationship between a good human interface and good code.

Link: [http://sean-parent.stlab.cc/papers-and-presentations](http://sean-parent.stlab.cc/papers-and-presentations)

<img src="/assets/meeting-cpp-2017/sean-parent-compose-mail.jpg">

<img src="/assets/meeting-cpp-2017/sean-parent-good-design.jpg">

#### Practical C++17 (Jason Turner)<a name="practical-c++17-jason-turner"></a>

[Jason Turner](https://twitter.com/lefticus) talked about what new features in C++17 he has found most valuable for his project [ChaiScript](http://www.chaiscript.com). ChaiScript is scripting language for C++. It was nice to listen to Jason in person since I have heard him talking on [http://cppcast.com/](http://cppcast.com/) many times.

Jason first listed a numbered a features he has used in ChaiScript and then ranked them based on readability, performance impact and such. I think I got the list written down correctly. He also made the [presentation at ccpcon 2017](https://www.youtube.com/watch?v=nnY4e4faNp0)  so you can double check there.

1. [class template deduction guides](http://en.cppreference.com/w/cpp/language/class_template_argument_deduction#User-defined_deduction_guides)
1. [`if constexpr`](http://en.cppreference.com/w/cpp/language/if#Constexpr_If)
1. [`string_view`](http://en.cppreference.com/w/cpp/string/basic_string_view)
1. [`emplace_back`](http://en.cppreference.com/w/cpp/container/vector/emplace_back)
1. [fold expressions](http://en.cppreference.com/w/cpp/language/fold)
1. [structured bindings](http://en.cppreference.com/w/cpp/language/structured_binding)
1. [class template argument deduction](http://en.cppreference.com/w/cpp/language/class_template_argument_deduction)
1. [nested namespaces](http://en.cppreference.com/w/cpp/language/namespace)
1. [if init](http://en.cppreference.com/w/cpp/language/namespace)
1. [`noexpect` in the type system](http://en.cppreference.com/w/cpp/language/noexcept_spec)

<img src="/assets/meeting-cpp-2017/jason-turner.jpg">

#### Strong types<a name="strong-types"></a>

[Jonathan Boccara](https://twitter.com/JoBoccara) talked about one possible way to implement strong types in C++.

The purpose of strong types is to carry meaning through names. Strong types also allow the programmer to create expressive code.

Link: [http://www.fluentcpp.com](http://www.fluentcpp.com)

<img src="/assets/meeting-cpp-2017/jonathan-boccara.jpg">

#### Modern C++ testing with Catch2<a name="modern-c++-testing-with-catch2"></a>

Phil Nash talked about the testing framework [Catch2](https://github.com/catchorg/Catch2). Catch2 is a header only test framwork.

Catch2 works well with the following mock frameworks:

* [Hippomocks](http://hippomocks.com)
* [tromploeil](https://github.com/rollbear/trompeloeil)

<img src="/assets/meeting-cpp-2017/phil-nash.jpg">

#### Beyond the compiler: Advanced tools for better productivity<a name="beyond-the-compiler:-advanced-tools-for-better-productivity"></a>

Gábor Horváth talked about tools that can help you as a programmer:

* [clang format](http://clang.llvm.org/docs/ClangFormat.html)
* clang tidy
* clang static analyzer
* CppCheck
* sanitizers
* source based coverage
* fuzz testing
* profile guided optimization
* lto
* strict analysis

<img src="/assets/meeting-cpp-2017/gabor-horvath.jpg">

### Day 2<a name="day-2"></a>

#### It's complicated<a name="its-complicated"></a>

The opening keynote of day 2 was held by [Kate Gregory](https://twitter.com/gregcons). She talked about her relationship with C++. She talked about the value of knowing the whole language: syntax, idioms and patterns to be able to the find the most fitting design for a certain scenario. Knowing also allows us to write more simple code by selecting a certain idiom or pattern. She discussed some principles of simplicity:

* move and hide complexity
* eliminate complexity altogether when possible
* readability matters
* good names
* use well recognized idioms

Kate went on to discuss the [C++ core guidelines](https://github.com/isocpp/CppCoreGuidelines/blob/master/CppCoreGuidelines.md). She discussed the value of a short and general guidelines such as "don't use exceptions" versus more complicated guidelines found in the core guidelines. She argued that the guidelines needs to be a bit complicated to guide us correctly in a complex world.

Her key take aways was:

* try to really learn the whole language
* use the core guidelines
* value simplicity 
* never stop learning

<img src="/assets/meeting-cpp-2017/kate-gregory-its-complicated-1.jpg">

<img src="/assets/meeting-cpp-2017/kate-gregory-its-complicated-2.jpg">

#### An inspiring introduction to template metaprogramming<a name="an-inspiring-introduction-to-template-metaprogramming"></a>

Milosz Warzecha introduced template metaprogramming to the audience.

Template metaprogramming is about doing things in compile time rather than in run time. Too much use of metaprogramming can afftect the compile time. Metaprogramming bugs can also be difficult to track down.

Milosz went on to tell us about how template metaprogramming started in the early 90ths by mistake. Erwin Unruh created a C++ program that calculated prime numbers during compile time and printed the output in compiler error messages. So the program could not actually compile be still produced the result.

Milosz discussed a number of programming techniques used to perform template metaprogramming:

* `static_assert`
* type traits, e.g. `is_class<T>`
* meta functioncs, e.g `remove_const`
* `is_same`
* `is_my_dream`
* `find_type`
* member detection trick
  * SFINAE
* `enable_if`
  * predicate - a function that return true or false
  * also use SFINAE
* containers for types
  * variadic templates
  * `push_back`
  * `pop_front`
* std::transform but at compile time

<img src="/assets/meeting-cpp-2017/milosz-warzecha.jpg">

#### Concepts Driven Design<a name="concepts-driven-design"></a>

[Kris Jusiak](https://twitter.com/krisjusiak) started the talk by telling us a little bit about the history of Concepts in C++. He specifically told us about a ISO C++ meeting in Frankfurt 2009. At that meeting Concepts was voted out of the standard. Kris Jusiaks understanding of the situation as that the committe did not want further delays in C++0X (later renamed to C++11) and Concepts was a complex addition that did not feel mature enough to include at the time:

* the syntax was considered only expert friendly
* the compile time was affected in an inacceptable way
* could not scale down

Bjarne Stroustrup wrote a paper already in 1987 what requirements he had on templates:

1. zero overhead
1. general
1. well specified interfaces

The top two items (1 & 2) were achieved when templates were originally introduced into C++ but not the last, due to the lack of Concepts.

There are mainly two motiviations behind concepts:

* to be able to put requirements on template type arguments
* to provide better compiler diagnostic messages when templates are used with incorrect types

Concepts are currently included in the C++ draft. Bjarne Strostrup and Andrew Stutton are very much involved in the work regarding getting Concepts into the standard.

Links:

* [C++20 draft](http://eel.is/c++draft/temp.constr)
* [Concepts](https://wg21.link/P0734R0)

<img src="/assets/meeting-cpp-2017/kris-jusiak.jpg">

#### Declarative Thinking, Declarative Practice<a name="declarative-thinking,-declarative-practice"></a>

Kevlin Henney talked about a declarative approach to programming.

Subtle state changes is a problem with imperative style.

<img src="/assets/meeting-cpp-2017/kevlin-henney.jpg">

#### Discussion among user group organisers<a name="discussion-among-user-group-organisers"></a>

Quite long discussion, missed last talk session.

### Day 3 (Saturday)<a name="day-3-saturday"></a>

#### Lightning talks<a name="lightning-talks"></a>

##### function\_ref (a non-owning reference to a Callable)<a name="function\_ref-a-non-owning-reference-to-a-callable"></a>
Vittorio Romeo gave a lightning talk about a [paper](http://open-std.org/JTC1/SC22/WG21/docs/papers/2017/p0792r0.html) he wrote where a proposes the addition of a so called `function_ref` to the standard library.

<img src="/assets/meeting-cpp-2017/vittorio-romeo.jpg">

##### A variant of recursive descent parsing<a name="a-variant-of-recursive-descent-parsing"></a>

[Björn Fahller](https://twitter.com/bjorn_fahller) gave a lightning talk with the title "A variant of recursive descent parsing".

<img src="/assets/meeting-cpp-2017/bjorn-fahller.jpg">

##### A Very Quick View Into a Compiler<a name="a-very-quick-view-into-a-compiler"></a>

[Arvid Gerstmann](https://twitter.com/ArvidGerstmann) gave a lightning talk with the title "A very quick view into a compiler".

<img src="/assets/meeting-cpp-2017/arvid-gerstmann.jpg">

##### Multi dimensional arrays in C++<a name="multi-dimensional-arrays-in-c++"></a>

Cem Bossay gave a lightning talk with the title "Multi dimensional array in C++".

<img src="/assets/meeting-cpp-2017/cem-bossay.jpg">

##### A short story about configuration file formats<a name="a-short-story-about-configuration-file-formats"></a>

Andreas Rein gave a lightning talk with the title "A hort story about configuration file formats".

<img src="/assets/meeting-cpp-2017/andreas-rein.jpg">

#### The hidden rules of world-class C++ code<a name="the-hidden-rules-of-world-class-c++-code"></a>

Boris Schäling talked about two alternative ways to design code to setup socket connections:

* traditional way using inheritance
* alternative way using
  * free functions
  * templates
  * classes 

Boris advocated the second alternative.

Goal of design:

* delegation of object creation
* extendiblity
* code reuse
* decouple init of factories from creating connection

Boris likes language features that solve specific use case locally in the code.

<img src="/assets/meeting-cpp-2017/boris-shaling.jpg">

#### Extra lightning talks<a name="extra-lightning-talks"></a>

##### Polymorphic tasks template in ten (minutes)<a name="polymorphic-tasks-template-in-ten-minutes"></a>

Sean Parent gave a lightning talk with the title "Polymorphic tasks template in ten (minutes)".

##### 5 things I figured out while I was supposed to be dying<a name="5-things-i-figured-out-while-i-was-supposed-to-be-dying"></a>

Kate Gregory gave a lightning talk with the title "5 things I figured out while I was supposed to be dying".

##### Diversity and inclusion<a name="diversity-and-inclusion"></a>

[Guy Davidsson](https://twitter.com/hatcat01) gave a lightning talk about diversity and inclusion on the C++ community.

Link: https://github.com/include-cpp/include

<img src="/assets/meeting-cpp-2017/guy-davidson-diversity-1.jpg">

<img src="/assets/meeting-cpp-2017/guy-davidson-diversity-2.jpg">

##### Rainer Grimm<a name="rainer-grimm"></a>

Rainer Grimm gave a lightning talk but I don't have a title unfortunately.

##### Composable command line parser in Catch2<a name="composable-command-line-parser-in-catch2"></a>

Phil Nash gave a lightning talk with the title "Composable command line parser in Catch2".

##### Programming in a different domain<a name="programming-in-a-different-domain"></a>

Jens Weller gave a ligttning talk about programming in a different domain.

#### Closing keynote: What can C++ do for embedded and what can embedded do for C++?<a name="closing-keynote:-what-can-c++-do-for-embedded-and-what-can-embedded-do-for-c++?"></a>

[Wouter van Ooijen](https://twitter.com/woutervanooijen) gave the closing keynote with the title "What can C++ do for embedded and what can embedded do for C++?".

<img src="/assets/meeting-cpp-2017/wouter-van-oijen-1.jpg">

