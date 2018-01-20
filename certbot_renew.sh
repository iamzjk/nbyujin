#!/usr/bin/env bash
python -c 'import random; import time; wait_time = random.random() * 3600; print "waiting for ", wait_time, " seconds"; time.sleep(wait_time)' && certbot renew
