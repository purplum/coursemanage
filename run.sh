#!/bin/bash

docker build -t allenyin/yfcoursemanage:latest .
docker push allenyin/yfcoursemanage:latest




#docker run -d -p 80:80 allenyin/yfcoursemanage:latest
