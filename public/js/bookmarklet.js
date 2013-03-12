(function () {
    var sty = document.createElement("style");
    sty.appendChild(document.createTextNode(".rittmebox{position: absolute;top: 50%;left: 50%;margin-top: -135px;margin-left: -250px;background: #16A085;width: 400px;height: 170px;padding: 25px;border: #2c3e50 2em solid; border-radius: 20px;text-align:right} .rittmebox input[type='text']{width: 96%;height: 30px;border: 1px solid rgba(0,0,0,0.2);border-radius: 5px;margin: 5px 0;padding: 2%;font-size: 16px;color: #555;text-aligh:left;} .rittmebox label{display: inline;text-align: right;color: #fff;font-size: 16px;margin: 10px 0 0;} .rittmebox input[type='submit']{background: #2ecc71;box-shadow:0 2px 1px rgba(0, 0, 0, 0.3),0 1px 0 rgba(255, 255, 255, 0.4) inset;border: none;padding: 10px 15px;border-radius: 10px;color: #fff;font-weight: bold;margin: 5px;display: block;} .rittmebox #rittmebox_close {position: absolute;top: -13px;right: -16px;background: #16A085;border: none;padding: 5px 8px;font-family: verdana;font-weight: bold;color: #fff;border-radius: 20px;cursor:pointer}"));
    document.head.appendChild(sty);
    var rittmebox = document.createElement("div");
    rittmebox.className = "rittmebox";
    rittmebox.innerHTML = '<div class="rittmebox"><button id="rittmebox_close">X</button><input id="rittmebox_name" value="' + document.title + '" type="text" name="name" placeholder="Title"><input id="rittmebox_url" value="' + location.href + '" type="text" name="url" placeholder="URL"><label><input type="radio" name="rittmebox_category" value="news">News</label><label><input type="radio" name="rittmebox_category" value="tutorial">Tutorial</label><label><input type="radio" name="rittmebox_category" value="good stuff">Good Stuff</label><label><input type="radio" name="rittmebox_category" value="Resources">Resources</label><input type="submit" id="rittmebox_send" value="Send"></div>';
    document.body.appendChild(rittmebox);
    var rittmeclosebtn = document.getElementById('rittmebox_close');
    rittmeclosebtn.addEventListener('click',rittmecloseaction);
    var rittmesendbtn = document.getElementById('rittmebox_send');
    rittmesendbtn.addEventListener('click',rittmesendaction);

    function rittmecloseaction(){
        rittmebox.remove();
        sty.remove();
    }

    function rittmesendaction(){
        location.href = 'http://www.rittme.com/bm/?url=' + 
                        encodeURIComponent(document.getElementById('rittmebox_url').value) + 
                        '&name=' + 
                        encodeURIComponent(document.getElementById('rittmebox_name').value) + 
                        '&category=' + 
                        encodeURIComponent(getCheckedValue(document.getElementsByName('rittmebox_category'))) +
                        '&origin=' +
                        encodeURIComponent(location.href);
    }

    function getCheckedValue(radioObj) {
        if(!radioObj)
            return "";
        var radioLength = radioObj.length;
        if (radioLength === undefined)
            if(radioObj.checked)
                return radioObj.value;
            else
                return "";
        for(var i = 0; i < radioLength; i++) {
            if(radioObj[i].checked) {
                return radioObj[i].value;
            }
        }
        return "";
    }
})();