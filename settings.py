# -*- coding: utf-8 -*-

# ================================================================ #

LOCAL_DEVELOPMENT = True # False means work on the shared DB

if LOCAL_DEVELOPMENT:
  try:
    from settings_local import *
  except ImportError:
    pass

