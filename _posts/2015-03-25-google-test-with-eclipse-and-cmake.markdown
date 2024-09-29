---
layout: post
title:  "Google Test/Google Mock with Eclipse CDT and Cmake"
date:   2015-03-25 19:45:00
categories: posts
---
How to setup Google Mock with Eclipse CDT and CMake. Google Mock also includes Google Test.

#### Create a new C++ project in Eclipse CDT

1. Start Eclipse CDT
1. Select workspace folder
1. Close the Welcome screen
1. Select "File - New - Other..."
1. Select "C/C++ - C++ Project"
1. Enter Project Name:
   <pre>
   TestProj
   </pre>
1. Select Project Type ''**Makefile** project - Empty Project'' and toolchain ''Linux GCC''
   ![](/assets/google_mock_1.png)
1. Click "Finish"
1. Select Yes if asked to open the C/C++ perspective

#### Build Google Test and Google Mock in Eclipse using CMake

Now we will import Google test and Google mock into our Eclipse project and build them with a minimalistic main file.

1. Create a folder with name <em>google</em> on your harddrive
1. Download Google Mock zip file (https://googlemock.googlecode.com/files/gmock-1.7.0.zip) to your new google folder and unpack
1. Right click on the <em>TestProj</em> project in Project Explorer and select New - Folder
1. Enter folder name <em>google</em> and click Finish
1. Right click on the <em>google</em> folder and select Import...
1. Select General - File system and click Next
1. Click Browse...
1. Select the <em>google</em> folder that you previously downloaded Google Mock to 
1. Check the google folder and click Finish
1. You should now have a <em>gmock-1.7.0</em> folder inside the google folder in the Project Explorer
   ![](/assets/google_mock_2.png)
1. Create a new folder <em>test</em> by right clicking on <em>TestProj</em> and selecting New - Folder
1. Right click on the <em>test</em> folder and select New - Source File
1. Enter name <em>main.cpp</em> and click on Finish
1. Add the following code to <em>main.cpp</em> and save:
   <pre>
   #include "gmock/gmock.h"
   
   int main(int argc, char* argv[]) {
     ::testing::InitGoogleMock(&amp;argc, argv);
     return RUN_ALL_TESTS();
   }
   </pre>
   ![](/assets/google_mock_3.png)

1. Right click on the <em>TestProj</em> project and select New - File
1. Select TestProj root folder as Parent Directory, enter name "CMakeLists.txt" and click Finish
1. Add the following to the <em>CMakeLists.txt</em> and save:
   <pre>
   #Set minimum CMake version required to run this file
   cmake_minimum_required(VERSION 2.8)
   
   #Set name of project 
   project("TestProj")
   
   #Set compiler flags:
   #  std=c+11 <-- Add support for C++11 features
   #  g3 <-- Include debugging information in build
   #  Wall <-- Enable all compiler warnings messages
   add_definitions(-Wall -g3 -std=c++11)
   
   #Add the given directories to those the compiler uses to search for include files
   #  CMAKE_CURRENT_SOURCE_DIR <-- This is the directory where the currently processed CMakeLists.txt is located in 
   include_directories(${CMAKE_CURRENT_SOURCE_DIR})
   
   #Add a subdirectory to the build. The directory specified must contain a CMakeLists.txt file.
   add_subdirectory(test)
   </pre>	
   ![](/assets/google_mock_4.png)

1. Create another CMakeLists.txt file inside the test folder
1. Add the following to the CMakeLists.txt file inside the test folder
   <pre>
   #Set a cache and an environment variable
   set(GMOCK_DIR "../google/gmock-1.7.0"
       CACHE PATH "The path to the GoogleMock test framework.")
   
   #Add a subdirectory to the build. The directory specified must contain a CMakeLists.txt file.
   #  GMOCK_DIR value has been set with the set command
   #  CMAKE_BINARY_DIR <-- The path to the top level of the build tree. That is the directory from where cmake is run.
   add_subdirectory(${GMOCK_DIR} {CMAKE_BINARY_DIR}/gmock)
   
   #Add the given directories to those the compiler uses to search for include files
   include_directories(SYSTEM ${GMOCK_DIR}/gtest/include
                              ${GMOCK_DIR}/include)
   
   include_directories(${CMAKE_SOURCE_DIR}/test)
   
   #The add_executable command tells CMake to create a binary
   #The first argument is the name of the binary to create, the
   #rest are source files. Header files are not included in this
   #command. 
   add_executable(testprojtest main.cpp)
   
   #target_link_libraries specifies libraries or flags to use 
   #when linking a given target. The named target (first 
   #argument) must have been created in the current directory
   #with add_executable() or add_library()
   target_link_libraries(testprojtest gmock_main)
   </pre>
   ![](/assets/google_mock_5.png)

1. Create a new folder <em>build</em> by right clicking on TestProj and selecting New - Folder
1. Now we will create a Make Target to generate the Makefiles from the CMakeLists.txt files.
1. Select the <em>Make Target</em> tab on the right side of Eclipse
1. Expand the <em>TestProj</em> project and right click on the <em>build</em> folder
1. Click on New...
1. Enter <em>Target name</em>: <code>cmake</code>
1. Uncheck <em>Same as the target name</em> and make the <em>Make target</em> box empty
1. Uncheck <em>Use builder settings</em> and enter <em>Build command</em>: <code>cmake ..</code> (please note the space followed by two dots at the end)
   ![](/assets/google_mock_6.png)
1. Click on OK
1. Double-click on the new Make Target cmake. Some files and folders shall be generated in the build folder. You can verify this in the Project Explorer on the left side of Eclipse.
1. Now we will configure some <em>TestProj</em> project settings so that we can build
1. Right click on the <em>TestProj</em> project in the Project Explorer and select Properties 
1. Go to "C/C++ Build", select tab "Builder Settings" and click on Workspace... button
1. Expand the folder tree and select the build folder. Click OK
1. Click on Apply
1. Click on OK to exit the project properties for TestProj 
1. Select menu Project - Build Project (click on TestProj in the Project Explorer first if this menu item is gray)
1. Open the Console tab and check that the build went fine
1. Select menu Run - Run Configurations...
1. Select <em>C/C++ Application</em> on the left and click on the <em>New</em> button
1. Enter Name: TestProjConsole
1. Click on button <em>Search Project...</em> and select <em>testprojtest</em>. Click OK.
1. You should now have <em>build/test/testprojtest</em> in the <em>C/C++ Application</em> field
   ![](/assets/google_mock_7.png)
1. Click on Apply and then on Run
1. You should get the following in the Console tab:
   <pre>
   [==========] Running 0 tests from 0 test cases.
   [==========] 0 tests from 0 test cases ran. (0 ms total)
   [  PASSED  ] 0 tests.
   </pre>

1. This means that we have run all our Google Tests. However currently we have 0 tests in our project.

#### Create a test

We will create a test for a class called AddClass that can be used to add numbers.

1. Create a new file in the test folder with name: <code>AddClassTest.cpp<code>
1. Add the following to the new file:
   <pre>
   #include "gmock/gmock.h"
   #include "AddClass.h"
   
   TEST(AddClassTest, CanAddTwoNumbers)
   {
     //Setup
     AddClass myAddClass;
   
     //Exercise
     int sum = myAddClass.add(1,2);
   
     //Verify
     ASSERT_EQ(3, sum);
   }
   </pre>
1. Locate the following line test/CMakeLists.txt:
   <pre>
   add_executable(testprojtest main.cpp)
   </pre>
   
   Add the new file <code>AddClassTest.cpp</code> to the line:
   <pre>
   add_executable(testprojtest main.cpp AddClassTest.cpp)
   </pre>
1. Build project via Project - Build Project
1. The build should fail because of the missing AddClass implementation
1. Create a new folder in the TestProj project with name: <code>src</code>
1. Create a new file in the src folder with name <code>AddClass.h</code> and the following content:
   <pre>
   #ifndef ADDCLASS_H_
   #define ADDCLASS_H_
   
   class AddClass
   {
   public:
     int add(int arg1, int arg2);
   }
   
   #endif
   </pre>
1. Create a new file in the src folder with name <code>AddClass.cpp</code> and the following content:
   <pre>
   #include "AddClass.h"
   
   int AddClass::add(int arg1, int arg2)
   {
     return arg1 + arg2;
   }
   </pre> 
1. Now we include the src folder when building
1. Locate the following line in the top CMakeLists.txt file:
   <pre>
   include_directories(${CMAKE_CURRENT_SOURCE_DIR})
   </pre>

   Add the following line below it:
   <pre>
   include_directories(${CMAKE_CURRENT_SOURCE_DIR}/src)
   </pre>
1. Create a CMakeLists.txt file in the src folder with the following content:
   <pre>
   add_library(src AddClass.cpp)
   </pre>
1. Add the following line to the top CMakeLists.txt file:
   <pre>
   add_subdirectory(src)
   </pre>
1. Finally we must make the new src library known to the test application by adding the following line at the end of test/CMakeLists.txt:
   <pre>
   target_link_libraries(testprojtest src)
   </pre>  
1. Build and run project
1. You should now get the following output in the Console tab:
   <pre>
   [==========] Running 1 test from 1 test case.
   [----------] Global test environment set-up.
   [----------] 1 test from AddClassTest
   [ RUN      ] AddClassTest.CanAddTwoNumbers
   [       OK ] AddClassTest.CanAddTwoNumbers (0 ms)
   [----------] 1 test from AddClassTest (1 ms total)
   
   [----------] Global test environment tear-down
   [==========] 1 test from 1 test case ran. (5 ms total)
   [  PASSED  ] 1 test.
   </pre>
