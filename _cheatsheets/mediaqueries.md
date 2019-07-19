# MediaQuery CheatSheat

### MediaQuery in Pixels

- @media (min-width:320px) { /_ smartphones, iPhone, portrait 480x320 phones _/ }
- @media (min-width:481px) { /_ portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. _/ }
- @media (min-width:641px) { /_ portrait tablets, portrait iPad, landscape e-readers, landscape 800x480 or 854x480 phones _/ }
- @media (min-width:961px) { /_ tablet, landscape iPad, lo-res laptops ands desktops _/ }
- @media (min-width:1025px) { /_ big landscape tablets, laptops, and desktops _/ }
- @media (min-width:1281px) { /_ hi-res laptops and desktops _/ }

Conversion Baseline expectations
100% = 1 em ~= 16px ~= 14pt

### MediaQuery in em

- @media (min-width:20em) { /_ smartphones, iPhone, portrait 480x320 phones _/ }
- @media (min-width:30.063em) { /_ portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. _/ }
- @media (min-width:40.063em) { /_ portrait tablets, portrait iPad, landscape e-readers, landscape 800x480 or 854x480 phones _/ }
- @media (min-width:60.063em) { /_ tablet, landscape iPad, lo-res laptops ands desktops _/ }
- @media (min-width:64.063em) { /_ big landscape tablets, laptops, and desktops _/ }
- @media (min-width:80.063em) { /_ hi-res laptops and desktops _/ }

### MediaQuery Types

- @media all ?
- @media screen ?

### Popular MediaQury Sizes used found on http://cssmediaqueries.com/overview.html

- @media all
- @media screen
- @media all and (orientation:landscape)
- @media screen and (min-width : 320px)
- @media screen and (min-width : 480px)
- @media screen and (min-width : 1224px)
- @media screen and (min-width : 29em)
- @media screen and (min-width : 35em)

### Designing MediaQueries for a device in mind

https://css-tricks.com/snippets/css/media-queries-for-standard-devices/
