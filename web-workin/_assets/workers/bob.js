function msgr(e) {
  
  var worker = this,
      msgSent = e.data;
  
  switch (msgSent.cmd) {
    case 'init':
        var defaults = {
          'name': 'bob'
        };
        worker.postMessage(defaults.name + ' is thinking...');
        worker.postMessage(msgSent.msg);
        break;
    case 'sendr':
        var msgRtn = msgSent.msg;
        worker.postMessage(msgRtn);
        break;
  }
}

this.addEventListener('message', msgr, false)
