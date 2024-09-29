---
layout: post
title:  "Install GCC Arm cross compile"
date:   2014-12-12 09:10:00
categories: posts
---

1. Install GCC ARM cross compiler using the packet manager
   <pre><code>sudo apt-get install gcc-arm-none-eabi</code></pre>
1. Install GDB ARM cross debugger using the packet manager 
   <pre><code>sudo apt-get -o Dpkg::Options::="--force-overwrite" install gdb-arm-none-eabi</code></pre>
   The <code>--force-overwrite</code>flag is needed because of a bug in the GDB packet [https://bugs.launchpad.net/ubuntu/+source/gdb-arm-none-eabi/+bug/1267680](https://bugs.launchpad.net/ubuntu/+source/gdb-arm-none-eabi/+bug/1267680). 
1. Install GNU cross binutils [http://www.gnu.org/software/binutils/](http://www.gnu.org/software/binutils/), above all <code>ld</code> - the GNU linker and <code>as</code> - the GNU assembler 
   <pre><code>sudo apt-get binutils-arm-none-eabi</code></pre>
1. Install C library and math library compiled for bare metal using Cortex A/R/M [https://sourceware.org/newlib/](https://sourceware.org/newlib/) 
   <pre><code>sudo apt-get libnewlib-arm-none-eabi</code></pre>
1. Check installation of GCC
   <pre><code>arm-none-eabi-gcc -v</code></pre>
   The last line should show version
   <pre>gcc version 4.8.2 (4.8.2-14ubuntu1+6)</pre>
