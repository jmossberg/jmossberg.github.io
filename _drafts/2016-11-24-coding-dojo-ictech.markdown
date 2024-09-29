---
layout: post
title: Coding Dojo @ ICTech
---

You are most welcome to the ICTech Coding Dojo at 2016-11-24!

### How to install the development environment

The development environment is based on Lubuntu and Eclipse CDT. We will run it through [VirtualBox](https://www.virtualbox.org).

1. Download **CodingDojoMossberg\_161124.zip** using one of the following links.

    * Dropbox: [CodingDojoMossberg\_161124.zip](http://bit.ly/2fFc4n3)

    * Google Drive (backup 1): [CodingDojoMossberg\_161124.zip](http://bit.ly/2gfB5oK)

    * Dropbox (backup 2): [CodingDojoMossberg\_161124.zip](http://bit.ly/2fFvqZ2)

    The image is ~3 GB so it will take a while to download it.

1. Unzip **CodingDojoMossberg\_161124.zip** and follow the instructions in **readme.pdf**.

1. Please send me an e-mail at `jacob (at sign) jacobmossberg.se` in case of problem.

### Error message in earlier version 

1. An earlier version of the development environment displayed a crash message after start.

    ![](/assets/codingdojo161124/codingdojo161124_error_message.png)

1. You can click on Continue and select `ignore errors of this type` if this happens.

1. The error message is caused by a bug in the pdf viewer in Lubuntu. It does **not** affect Eclipse.

### Screenshot

Below is a screenshot showing the development environment with the Roman Numerals kata . 

![](/assets/codingdojo161124/dev_environment_screenshot.png)

### Import Eclipse projects without Virtual Machine

1. If you already have the following installed on your machine you should be able to import the Kata Eclipse projects without downloading the full virtual machine:
    * Eclipse CDT
    * g++   >= version 5
    * gcc   >= version 5
    * gdb
    * cmake >= version 3.5

1. Download [eclipse\_projects\_coding\_dojo\_161124.zip](http://bit.ly/2gi6iLG)

1. Extract **eclipse_projects_coding_dojo_161124.zip** to any folder. The zip file contains the following projects:
    * FizzBuzz
    * RomanNumerals
    * StringCalculator

1. Start Eclipse

1. Select File - Import ... - General - Existing Project Into Workspace

    <img src="/assets/codingdojo161124/import_type_box.png" width="500">

1. In the Import dialog box: 
    * Select Folder where you unpacked `eclipse_projects_coding_dojo_161124.zip`.
    * Select to import FizzBuzz, RomanNumerals and StrinCalculator.
    * Enable `Copy projects into workspace`
    * Click Finish 

    <img src="/assets/codingdojo161124/import_dialog_box.png" width="500">

1. To build and run RomanNumerals tests:
    * Goto the `Make Target` on the right side of Eclipse
    * Expand RomanNumerals
    * Expand build folder
    * Double click on cmake

    <img src="/assets/codingdojo161124/cmake_target.png" width="200">

    * Make sure Console tab output looks ok

    <img src="/assets/codingdojo161124/cmake_target_console_output.png" width="600">

    * Right click on RomanNumerals in the Project Explorer on the left side of Eclipse
    * Select Properties
    * Goto C/C++ Build - Builder Settings tab
    * Click on Workspace... and select the build folder in RomanNumerals as Build directory
    * Click Apply and then OK
    * Select CMakeLists.txt in RomanNumerals on the left side of Eclipse
    * Select menu Project - Build Project
    * Check that build is fine in the Console tab
    * Right click on RomanNumerals in the Project Explorer and select Refresh
    * Expand Binaries
    * Right click on `roman_numerals_tests` and select Run As - Local C/C++ application
    * You should get run output from Google test in the Console tab showing test `CanConvertOne` is passing

    <img src="/assets/codingdojo161124/run_roman_numerals_tests_console_output.png" width="500">

    * You are good to go with the kata! :)
