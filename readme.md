#Lazy Input Correction

Checks input fields for poor capitalization.  User input that is all lowercase or all uppercase will be properly capitalized with the first letter capital. Extra whitespace around input will also be removed.

- Version: 1.01
- Author: Mark Lewis <mark@casadelewis.com>
- Build Date: 06 January 2012
- Requirements: Symphony 2.2

### What's being checked

If the first letter of a word in the input is lowercase, then the input will be filtered.
If the first letter of a word is the capital and the last letter of that word is capital, then the input will be filtered.

### Examples

- mcdonald to Mcdonald
- MCDONALD to Mcdonald
- McDonald to McDonald

##Install

1. Upload the 'proper_user_input' folder in this archive to your Symphony
   'extensions' folder.
2. Enable extension by selecting the "Lazy Input Correction" item under Extensions, choose Enable
   from the with-selected menu, then click Apply.

##Uninstall

1. Uninstall extension by selecting the "Lazy Input Correction" item under Extensions, choose Uninstall from the with-selected menu, then click Apply.

##History

- 1.01 Fixed Section bug. Section class was missing.
- 1.0 Public release
- 0.1 Initial version