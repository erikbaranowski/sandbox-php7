#!/usr/bin/env bash

for filename in /sandbox/box-init/scripts/before/*.sh
do
    sh $filename
done

cp -R /sandbox/box-init/files/* /

for filename in /sandbox/box-init/scripts/after/*.sh
do
    sh $filename
done
