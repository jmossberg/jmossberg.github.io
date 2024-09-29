---
layout: post
title:  "Import existing git managed C makefile project into Eclipse CDT"
date:   2015-12-15 20:30:00
categories: jekyll update
---

## Install gdb in Cygwin

We need gdb installed in Cygwin to be able to do step debugging in Eclipse.

1. Start Cygwin 64-bit installer, "setup-x86_64", which is the same used for original installation of Cygwin 64-bit
   ![](/assets/import-git-cdt/pic001_setup-x86_64.png)
1. Select gdb package
   ![](/assets/import-git-cdt/pic002_cygwin_gdb_installation.png)

## Install Java Run Time Environment 64-bit

1. Download Java Runtime Environment (JRE) 64-bit for Windows: http://javadl.sun.com/webapps/download/AutoDL?BundleId=113219
1. Double-click on "jre-8u66-windows-x64" (name may differ depending on current version at the time of download) to install JRE

## Install Eclipse 64-bit

1. Eclipse CDT is an IDE for C/C++ development. The original Eclipse is for Java development.
1. Download Eclipse CDT 64-bit: http://www.eclipse.org/downloads/download.php?file=/technology/epp/downloads/release/mars/1/eclipse-cpp-mars-1-win32-x86_64.zip
1. Unpack the zip file and copy to appropiate location, e.g. c:\eclipse

## Create Eclipse project for unity demo

1. Start Eclipse and select a workspace folder
1. Select File - Import...
1. Git - Projects from Git     
1. Select "Local" Repository Source
1. Select Git Repository "C:\cygwin64\home\jacob\git\unitydemo"
1. Select "Import using the New Project wizard" and click Finish
1. Select C/C++ - Makefile Project with Existing Code
1. Project Name "UnityDemo"
1. Existing Code Location: "C:\cygwin64\home\jacob\git\unitydemo"
1. Enable C language and disable C++ language
1. Toolchain: Cygwin GCC
1. Click Finish

   ![](/assets/import-git-cdt/pic003_new_eclipse_project.png)

## Build UnityDemo in Eclipse CDT

1. Right click on "UnityDemo" in the Project Explorer and select Properties
   ![](/assets/import-git-cdt/pic004_project_properties.png)
1. Go to "C/C++ Build" and make sure "Build command" is set to "make" in the "Builder Settings" tab
   ![](/assets/import-git-cdt/pic005_build_settings_1.png)
1. Go the "Behavior" tab and make sure make sub command is set to "all".
   ![](/assets/import-git-cdt/pic006_build_settings_2.png) 
1. Click on OK to exit "Properties for UnityDemo"
1. Select "UnityDemo" in the Project Explorer and select menu Project - Build Project
1. Watch the output the Console tab

   ![](/assets/import-git-cdt/pic007_build_unitydemo.png)

## Run UnityDemo tests in Eclipse CDT

1. Select "UnityDemo" in the Project Explorer and select menu Run - Run Configurations...
1. Right click on "C/C++ Application" on the left side of the "Run Configurations" window and click New
1. Enter name "add_test.out"
1. Set Project to "UnityDemo" in the "Main" tab
1. Set "C/C++ Application" to add_test.out in the "Main" tab. You can use "Seach Project..." button to find all available exectuables in the project. This requires you to have performed a build prior to setting up run configurations.
1. Click on "Apply"
   ![](/assets/import-git-cdt/pic008_run_configurations_1.png)
1. Go to the "Arguments" tab and enter "-v" int the "Program arguments" text box. This is to get verbose output when running the tests.
   ![](/assets/import-git-cdt/pic009_run_configurations_2.png) 
1. Click on "Apply"
1. Create a similar run configuration for "remap_test.out".
1. Select add_test.out on the left side and click "Run"
1. You should see test output in the Console tab

  ![](/assets/import-git-cdt/pic010_run_add_test_tests.png)

## Debug UnityDemo in Eclipse CDT

1. Find add_test.c  in the Project Explorer on the left side of Eclipse
1. Edit add_test.c
1. Goto first row in the "CanAdd" test
1. Select menu Run - Toggle Breakpoint
1. You should get a blue ball on the current line indicating a breakpoint is active
1. Select "UnityDemo" in the Project Explorer and select menu Run - Debug Configurations...
1. The Run Configurations "add_test.out" and "remap_test.out" should already be present on the left side of the "Debug Configurations" window
1. Goto the "Debugger" tab and make sure "GDB debugger" is set to "gdb"
   ![](/assets/import-git-cdt/pic011_debug_configurations.png)
1. Select "add_test.out" on the left side and click on "Debug"
1. Select Yes when asked whether to switch to the Debug perspective
1. The debugger will halt on the first line in the main file which is located in the add_test_main.c file
1. Select Run - Resume... to go to the next breakpoint which is the one we set in the "canAdd" test
1. Select button "Locate File..." when you get "Can't find a source file..." and locate add_test.c in c:\cygwin64\home\jacob\git\unitydemo
   ![](/assets/import-git-cdt/pic012_debug_session_1.png)
