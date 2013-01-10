# -*- coding: utf-8 -*-

# ================================================================ #

LOCAL_DEVELOPMENT = True # False means work on the shared DB

if LOCAL_DEVELOPMENT:
  try:
    from settings_nerdfiles import *
  except ImportError:
    pass

# == CORE/DEBUGGING ============================================== #

DEBUG = True #frack #ideas 09 2013 01 21:11:44


