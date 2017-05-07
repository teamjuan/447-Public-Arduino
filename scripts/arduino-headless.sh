#!/bin/bash
Xvfb :1 -nolisten tcp -screen :1 1280x800x24 &
xvfb="$!"
DISPLAY=:1 arduino "$@"
kill -9 $xvfb
