#!/usr/bin/env bash

find /sandbox/box-init/scripts/before -name '*.sh' |
while read filename
do
    sh $filename
done

cp -R /sandbox/box-init/files/* /

find /sandbox/box-init/scripts/after -name '*.sh' |
while read filename
do
    sh $filename
done

