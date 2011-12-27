# -*- coding: utf-8 -*-

# == DEVELOPMENT/DEBUGGING ======================================= #

DEBUG = True # True doesn't work; 500 errors, again

TEMPLATE_DEBUG = DEBUG

LOCAL_DEVELOPMENT = True # False means work on the shared DB

if LOCAL_DEVELOPMENT:
  try:
    from settings_pbdigital import *
  except ImportError:
    pass

