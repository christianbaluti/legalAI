function showingFunction(){
    document.getElementById("hidethis").style.display = "block";
}
function hidingFunction(){
    document.getElementById("hidethis").style.display = "none";
}

function openchat(caseid) {
  // Store the caseid in a variable
  let thecaseid = caseid;

  // Redirect to chat.php with thecaseid in the URL
  window.location.href = 'chat.php?caseid=' + encodeURIComponent(thecaseid) + '#last';
}

function openchatlawyer(caseid) {
  // Store the caseid in a variable
  let thecaseid = caseid;

  // Redirect to chat.php with thecaseid in the URL
  window.location.href = 'chat_lawyer.php?caseid=' + encodeURIComponent(thecaseid)  + '#last';
}


function chatcontent(thecaseid) {
  // body...
  let caseid = thecaseid;
  return caseid;

}

//console.log(chatcontent());

function openLink(evt, linkName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("myLink");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" theVibe", "");
  }
  document.getElementById(linkName).style.display = "block";
  evt.currentTarget.className += " theVibe";
}

// Click on the first tablink on load
document.getElementsByClassName("tablink")[0].click();

function openService(theTabName) {
  if (theTabName === 'aichat') {
    document.querySelector('.my-hero-image').style.display = 'none';
    document.getElementById('aichat').style.display = 'block';
    document.getElementById('willwriter').style.display = 'none';
  } else if (theTabName === 'willwriter') {
    document.querySelector('.my-hero-image').style.display = 'none';
    document.getElementById('aichat').style.display = 'none';
    document.getElementById('willwriter').style.display = 'block';
  }
}

