---
layout: post
title:  "Install STM32F10X standard peripheral library"
date:   2014-12-12 20:52:00
categories: posts
---

http://www.st.com/web/en/catalog/tools/PF257890

http://www.st.com/st-web-ui/static/active/en/st_prod_software_internet/resource/technical/software/firmware/stsw-stm32054.zip

Description of the STM32F10X standard peripheral libarary from its documentation:

> The STM32F10x Standard Peripherals Library is a complete package,
> consisting of device drivers for all of the standard device peripherals,
> for STM32 Value line(High, Medium and Low), Connectivity line, XL-,
> High-, Medium- and Low- Density Devices 32-bit Flash microcontrollers. 
>
> This library is a firmware package which contains a collection of routines,
> data structures and macros covering the features of STM32 peripherals. It
> includes a description of the device drivers plus a set of examples for
> each peripheral. The firmware library allows any device to be used in
> the user application without the need for in-depth study of each peripheral’s
> specifications. 
>
> Using the Standard Peripherals Library has two advantages: it saves
> significant time that would otherwise be spent in coding, while simultaneously
> reducing application development and integration costs. 
> The STM32F10x Standard Peripherals Library is full CMSIS compliant. 

Download the standard peripheral library from the STMicroelectronics site:
<pre>wget http://www.st.com/st-web-ui/static/active/en/st_prod_software_internet/resource/technical/software/firmware/stsw-stm32054.zip</pre>

Unzip the library:
<pre>unzip stsw-stm32054.zip</pre>
