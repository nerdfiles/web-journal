"""
fabbin' fer PHP shit
"""

import posixpath
import datetime

from fabric.api import run, local, abort, env, put, settings, cd, task
from fabric.decorators import runs_once
from fabric.contrib.files import exists
from fabric.context_managers import cd, lcd, settings, hide

LOCAL_DEVELOPMENT = False

env.hosts = ['nerdfiles@nerdfiles.net']
env.site = 'web-journal'
env.project = '/home/nerdfiles/webapps/webjournal'
env.venv = '/home/nerdfiles/.virtualenvs/web_journal'

if LOCAL_DEVELOPMENT:
  DJANGO_APP_ROOT = '/Users/nerdfiles/Sites/nerdfiles.net/web-journal/' 
else:
  DJANGO_APP_ROOT = env.project+'/'
  

# Directory where static sources should be collected.  This must equal the value
# of STATIC_ROOT in the settings.py that is used on the server.
STATIC_ROOT = '/home/nerdfiles/webapps/webjournal/wp-content/themes/blog.nerdfiles.net/_assets/' 

# Subdirectory of DJANGO_APP_ROOT in which project sources will be stored
SRC_SUBDIR = 'src'

if LOCAL_DEVELOPMENT:
  VENV_SUBDIR = '/Users/nerdfiles/.virtualenvs/web_journal/'
else:
  VENV_SUBDIR = env.project+'/'

# Python version
PYTHON_BIN = "python2.7"
PYTHON_PREFIX = "" # e.g. /usr/local  Use "" for automatic
PYTHON_FULL_PATH = "%s/bin/%s" % (PYTHON_PREFIX, PYTHON_BIN) if PYTHON_PREFIX else PYTHON_BIN


# Commands to stop and start the webserver that is serving the Django app.
# CHANGEME!  These defaults work for Webfaction
DJANGO_SERVER_STOP = posixpath.join(DJANGO_APP_ROOT, 'apache2', 'bin', 'stop')
DJANGO_SERVER_START = posixpath.join(DJANGO_APP_ROOT, 'apache2', 'bin', 'start')
DJANGO_SERVER_RESTART = None

src_dir = posixpath.join(VENV_SUBDIR, SRC_SUBDIR)
venv_dir = posixpath.join(VENV_SUBDIR)

@task
def host_type():
    run('uname -s')

def virtualenv(venv_dir):
    """
    Context manager that establishes a virtualenv to use.
    """
    return settings(venv=venv_dir)

def run_venv(command, **kwargs):
    """
    Runs a command in a virtualenv (which has been specified using
    the virtualenv context manager
    """
    run("source %s/bin/activate" % env.venv + " && " + command, **kwargs)

@task
def install_dependencies():
    ensure_virtualenv()
    with virtualenv(env.project):
        with cd(src_dir):
            run_venv("pip install -r requirements.txt")

@task
def ensure_virtualenv():
    if exists(env.venv):
        return

    with cd(env.project):
        run("virtualenv --no-site-packages --python=%s %s" %
            (PYTHON_BIN, env.venv))
        run("echo %s > %s/lib/%s/site-packages/projectsource.pth" %
            (src_dir, env.venv, PYTHON_BIN))

@task
def pack():
  print('Packaging instance...')
  local('rm -rf wp-deploy/')
  local('mkdir wp-deploy && cd wp-deploy && touch .delete-me && cd ..')
  local('git archive --format=tar HEAD | gzip > wp-deploy/%s.tar.gz' % env.site)
  print('Package created: ./wp-deploy/%s.tar.gz at %s' % (env.site, datetime.datetime.now()))

@task
def remote_pull():
  with cd('%s' % env.project):
    run('git pull -u origin dev')

@task
def push_sources():
    """
    Push source code to server
    """
    #ensure_src_dir()
    pack()
    #run('cd /home/nerdfiles/webapps/webjournal/')
    #with cd('/home/nerdfiles/webapps/webjournal/'):
    with cd('%s' % env.project):
      if not exists('%s/wp-deploy' % env.project):
        run('mkdir wp-deploy')
    put('wp-deploy/%s.tar.gz' % env.site, '%s/wp-deploy/' % env.project)
    with cd('%s/wp-deploy/' % env.project):
      run('tar zxvf %s/wp-deploy/%s.tar.gz -C ../' % (env.project, env.site))

@task
def webserver_stop():
    """
    Stop the webserver that is running the Django instance
    """
    run(DJANGO_SERVER_STOP)


@task
def webserver_start():
    """
    Startsp the webserver that is running the Django instance
    """
    run(DJANGO_SERVER_START)


@task
def webserver_restart():
    """
    Restarts the webserver that is running the Django instance
    """
    if DJANGO_SERVER_RESTART:
        run(DJANGO_SERVER_RESTART)
    else:
        with settings(warn_only=True):
            webserver_stop()
        webserver_start()


def sass_it():
  with cd('%s/../' % STATIC_ROOT):
    run('sass-convert global.scss global.css')
    #run("sass --watch -t compressed global.scss:global.css")

@task
def deploy():
    pack()
    push_sources()
    install_dependencies()
    #update_database()
    #build_static()
    sass_it()
    webserver_start()

@task
def sync():
  remote_pull()
  sass_it()

