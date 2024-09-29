all:
	@echo "Make targets"
	@cat makefile | grep '^[a-zA-Z]' | sed 's/:.*//g' | sed 's/^/  /g'

build: test_program.c startup.c stm32.ld clean
	@echo
	@echo "Build production image"
	arm-none-eabi-gcc -c -mcpu=cortex-m3 -mthumb -o test_program.o test_program.c
	arm-none-eabi-gcc -c -mcpu=cortex-m3 -mthumb -o startup.o startup.c
	arm-none-eabi-ld -Tstm32.ld -o test_program.elf startup.o test_program.o
	arm-none-eabi-objcopy -O binary test_program.elf test_program.bin

build_debug: test_program.c startup.c stm32.ld clean
	@echo
	@echo "Build debug image"
	arm-none-eabi-gcc -O0 -c -g -mcpu=cortex-m3 -mthumb -o test_program.o test_program.c
	arm-none-eabi-gcc -O0 -c -g -mcpu=cortex-m3 -mthumb -o startup.o startup.c
	arm-none-eabi-ld -Tstm32.ld -o test_program.elf startup.o test_program.o
	arm-none-eabi-objcopy -O binary test_program.elf test_program.bin

print_gcc_assembler:
	@echo
	@echo "Print assembler code of test_program.c using the arm-none-eabi-gcc -S option"
	arm-none-eabi-gcc -S -mcpu=cortex-m3 -mthumb test_program.c
	cat test_program.s
	@echo
	@echo "Print assembler code of startup.c using the arm-none-eabi-gcc -S option"
	arm-none-eabi-gcc -S -mcpu=cortex-m3 -mthumb startup.c
	cat startup.s

print_disassemble:
	@echo
	@echo "Print assembler code of test_program.elf with objdump"
	arm-none-eabi-objdump -S --disassemble test_program.elf
	@echo
	@echo "Print assembler code of test_program.o with objdump"
	arm-none-eabi-objdump -S --disassemble test_program.o
	@echo
	@echo "Print assembler code of startup.o with objdump"
	arm-none-eabi-objdump -S --disassemble startup.o

print_symbols_nm:
	@echo
	@echo "Print symbols of test_program.o using nm"
	arm-none-eabi-nm --numeric-sort test_program.o
	@echo
	@echo "Print symbols of startup.o using nm"
	arm-none-eabi-nm --numeric-sort startup.o
	@echo
	@echo "Print symbols of test_program.elf using nm"
	arm-none-eabi-nm --numeric-sort test_program.elf

print_symbols_objdump:
	@echo
	@echo "Print symbols of test_program.o using objdump"
	arm-none-eabi-objdump --syms test_program.o
	@echo
	@echo "Print symbols of startup.o using objdump"
	arm-none-eabi-objdump --syms startup.o
	@echo
	@echo "Print symbols of test_program.elf using objdump"
	arm-none-eabi-objdump --syms test_program.elf

print_sections:
	@echo
	@echo "Print sections of test_program.o using objdump"
	arm-none-eabi-objdump -h test_program.o
	@echo
	@echo "Print sections of startup.o using objdump"
	arm-none-eabi-objdump -h startup.o
	@echo
	@echo "Print sections of test_program.elf using objdump"
	arm-none-eabi-objdump -h test_program.elf

clean:
	@echo
	@echo "Running target clean"
	rm -f *.o
	rm -f *.elf
	rm -f *.bin
	rm -f *.s
