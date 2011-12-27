"""
fabbin' fer PHP shit
"""

import posixpath
import datetime

from fabric.api import run, local, abort, env, put, settings, cd, task
from fabric.decorators import runs_once
from fabric.contrib.files import exists
from fabric.context_managers import cd, lcd, settings, hide

import settings

DEBUG = settings.DEBUG
DEPS = False

env.hosts = ['nerdfiles@nerdfiles.net']
env.site = 'web-journal'
env.project = '/home/nerdfiles/webapps/webjournal'
env.venv = '/home/nerdfiles/.virtualenvs/web_journal'
env.src = 'src'
env.static = '%s/wp-content/themes/blog.nerdfiles.net/_assets' % env.project 

PYTHON_BIN = "python2.7"
PYTHON_PREFIX = "" # e.g. /usr/local  Use "" for automatic
PYTHON_FULL_PATH = "%s/bin/%s" % (PYTHON_PREFIX, PYTHON_BIN) if PYTHON_PREFIX else PYTHON_BIN

# for mod_wsgi setups

DJANGO_SERVER_STOP = posixpath.join(env.project, 'apache2', 'bin', 'stop')
DJANGO_SERVER_START = posixpath.join(env.project, 'apache2', 'bin', 'start')
DJANGO_SERVER_RESTART = posixpath.join(env.project, 'apache2', 'bin', 'restart')

# dirs

src_dir = posixpath.join(env.venv, env.src)
venv_dir = posixpath.join(env.venv)

# utilities

def virtualenv(venv_dir):
  return settings(venv=venv_dir)

def run_venv(command, **kwargs):
  run("source %s/bin/activate" % env.venv + " && " + command, **kwargs)

def push_sources():
  with cd('%s' % env.project):
    print('Securing deploy folder...')
    if not exists('%s/wp-deploy' % env.project):
      run('mkdir wp-deploy')
  print('Placing in %s/wp-deploy/%s.tar.gz' % (env.project, env.site))
  put('wp-deploy/%s.tar.gz' % env.site, '%s/wp-deploy/' % env.project)
  print('Extracting %s/%s.tar.gz to %s' % (env.project, env.site, env.project)) 
  with cd('%s/wp-deploy/' % env.project):
    run('tar zxvf %s/wp-deploy/%s.tar.gz -C %s' % (env.project, env.site, env.project))

# usual utils

'''
@task
def compass_it():
  with cd('%s/_css' % env.static):
    #run('')
'''

@task
def sass_it():
  with cd('%s/_css' % env.static):
    run('compass watch compass')
    #run('sass global.scss global.css')

@task
def compasswatch():
  with cd('%s/_css' % env.static):
    #run('compassing')
    run('compass watch compass')

@task
def host_type():
  run('uname -s')

@task
def deps():
  ensure_virtualenv()
  with virtualenv(env.venv):
    with cd(env.project):
      run_venv("pip install -r requirements.txt")

@task
def ensure_virtualenv():
  if exists(env.venv):
    return
  run("mkvirtualenv --no-site-packages --python=%s %s" %
    (PYTHON_BIN, env.venv))
  run("echo %s > %s/lib/%s/site-packages/projectsource.pth" %
    (src_dir, env.venv, PYTHON_BIN))

@task
def pack():
  print('Removing previous package ./wp-deploy/%s.tar.gz' % env.site)
  local('rm -rf wp-deploy/')
  local('mkdir wp-deploy && cd wp-deploy && touch .delete-me && cd ..')
  print('Archiving ./wp-deploy/%s.tar.gz' % env.site)
  local('git archive --format=tar HEAD | gzip > wp-deploy/%s.tar.gz' % env.site)
  print('Package created: ./wp-deploy/%s.tar.gz at %s' % (env.site, datetime.datetime.now()))

@task
def local_push():
  local('git status')
  local('git add .')
  local('git commit -am "quick_sync @ %s"' % datetime.datetime.now())
  local('git push -u origin dev')

@task
def remote_pull():
  print('Pulling to %s' % env.project)
  with cd('%s' % env.project):
    run('git pull -u origin dev')

# server admin

@task
def start_remote():
  run('%' % DJANGO_SERVER_START)

@task
def stop_remote():
  run('%' % DJANGO_SERVER_STOP)

# the usual interfaces

@task
def deploy():
  pack()
  push_sources()
  if DEPS:
    deps()
  sass_it()

@task
def syncup():
  local_push()
  remote_pull()

@task
def compassup():
  local_push()
  remote_pull()
  #compass_it()

@task
def compassing():
  local_push()
  remote_pull()
  compasswatch()

