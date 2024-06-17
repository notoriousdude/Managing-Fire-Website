setTimeout(function(){
    document.querySelector('.vu16').style.top = "0"
}, 1000);

document.querySelector('.vu19').onclick = async()=>{
    localStorage.setItem('notify', 'true');
    notifyTrue();
    notifyOption();
}

function notifyTrue() {
    if(localStorage.getItem('notify', 'true')){
        document.querySelector('.vu16').style.display = 'none';
    }
}
notifyTrue();

document.querySelector('.vu18').onclick = async()=>{
    localStorage.setItem('notify', 'false');
    notifyFalse();
}

function notifyFalse() {
    if(localStorage.getItem('notify', 'false')){
        document.querySelector('.vu16').style.display = 'none';
    }
}
notifyFalse();

function showNotification(){
    var notificationBody = new Notification('Announcement 1', {
        body: 'A forest fire in Arizona has broken out in a nearby area.',
        icon: 'images/icon.png'
    })
}
function showNotification2(){
    var notificationBody = new Notification('Announcement 2', {
        body: 'There is a heightened forest fire risk in the Pine Valley area',
        icon: 'images/icon.png'
    })
}
function showNotification3(){
    var notificationBody = new Notification('Announcement 3', {
        body: 'A forest fire alert has been issued for the Oakridge community',
        icon: 'images/icon.png'
    })
}


function notifyOption() {
    if(localStorage.notify === 'true') {
        if(Notification.permission === 'granted') {
            // showNotification();
            if(localStorage.notifyMessage === undefined) {
                localStorage.setItem('notifyMessage', 'true');
                showNotification();
            }
            if(localStorage.notifyMessage2 === undefined) {
                localStorage.setItem('notifyMessage2', 'true');
                showNotification2();
            }
            if(localStorage.notifyMessage3 === undefined) {
                localStorage.setItem('notifyMessage3', 'true');
                showNotification3();
            }
        } else if(Notification.permission !== 'denied') {
            Notification.requestPermission().then(perm => {
                if(permission === 'granted'){
                    if(localStorage.notifyMessage === undefined) {
                        localStorage.setItem('notifyMessage', 'true');
                        showNotification();
                    }
                }
            })
        }
    }
}
notifyOption();