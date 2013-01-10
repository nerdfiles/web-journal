# -*- coding: utf-8 -*-

# ================================================================ #

LOCAL_DEVELOPMENT = True # False means work on the shared DB

if LOCAL_DEVELOPMENT:
  try:
    from settings_pbdigital import *
  except ImportError:
    pass

