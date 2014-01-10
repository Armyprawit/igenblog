function addtag(elementName, tag) {
    var obj = document.getElementById(elementName);

    beforeText = obj.value.substring(0, obj.selectionStart);
    selectedText = obj.value.substring(obj.selectionStart, obj.selectionEnd);
    afterText = obj.value.substring(obj.selectionEnd, obj.value.length);

    switch(tag) {
        
        case "h1":
            tagOpen = "<h1>";
            tagClose = "</h1>";

            newText = beforeText + tagOpen + selectedText + tagClose + afterText;
        break;

        case "h2":
            tagOpen = "<h2>";
            tagClose = "</h2>";

            newText = beforeText + tagOpen + selectedText + tagClose + afterText;
        break;

        case "p":
            tagOpen = "<p>";
            tagClose = "</p>";

            newText = beforeText + tagOpen + selectedText + tagClose + afterText;
        break;


        case "b":
            tagOpen = "<strong>";
            tagClose = "</strong>";

            newText = beforeText + tagOpen + selectedText + tagClose + afterText;
        break;

        case "i":
            tagOpen = "<em>";
            tagClose = "</em>";

            newText = beforeText + tagOpen + selectedText + tagClose + afterText;
        break;


        // PHOTO
        case "photo":
            imgURL = prompt("ลิ้งรูปภาพ\nตัวอย่าง: http://www.example.com/image.jpg", "");
            imgALT = prompt("คำอธิบายรูปภาพ", "");

            if (imgURL == null) {
                break;
            }

            tagOpen = '<figure><a class="fancybox" rel="group" href="'+imgURL+'" title="'+imgALT+'"><img src="'+imgURL+'" alt="'+imgALT+'"><figcaption>'+imgALT+'</figcaption>';
            tagClose = "</a></figure>";

            newText = beforeText + tagOpen + selectedText + tagClose + afterText;
        break;

        case "youtube":
            vidURL = prompt("Youtube URL\nExample: http://www.youtube.com/watch?v=mozB6htR7mc", "");

            if (vidURL == null) {
                break;
            }
            else{
                var n = vidURL.indexOf("v=");
                vidURL = vidURL.substring(n+2,n+2+11);
            }

            tagOpen = '<iframe src="//www.youtube.com/embed/'+vidURL+'?version=3&amp&rel=0&showinfo=0&autohide=1&theme=light&autoplay=0" allowfullscreen>';
            tagClose = "</iframe>";

            newText = beforeText + tagOpen + selectedText + tagClose + afterText;
        break;

        case "link":
            linkURL = prompt("Youtube URL\nExample: http://www.youtube.com/watch?v=mozB6htR7mc", "");
            linkTITLE = prompt("Youtube URL\nExample: http://www.youtube.com/watch?v=mozB6htR7mc", "");

            if (linkURL == null) {
                break;
            }

            tagOpen = '<a href="'+linkURL+'" title="'+linkTITLE+'" target="_bank">';
            tagClose = "</a>";

            newText = beforeText + tagOpen + selectedText + tagClose + afterText;
        break;

        // case "underline":
        //     tagOpen = "[u]";
        //     tagClose = "[/u]";

        //     newText = beforeText + tagOpen + selectedText + tagClose + afterText;
        // break;

        case "url":
            var patternHTTP = /http:\/\//i;
            url = prompt("Enter URL without http://\nExample: www.example.com", "");
            
            if (url == null) {
                break;
            } else if (url.match(patternHTTP)) {
                url = url.replace("http://", "");
            }

            tagOpen = "[url=" + url + "]";
            tagClose = "[/url]";

            newText = beforeText + tagOpen + selectedText + tagClose + afterText;
        break;

        case "img":
            imgURL = prompt("Enter image URL without http://\nExample: www.example.com/image.jpg", "");

            if (imgURL == null) {
                break;
            }

            tagOpen = "[img=" + imgURL + "]";
            tagClose = "[/img]";

            newText = beforeText + tagOpen + selectedText + tagClose + afterText;
        break;
    }

    obj.value = newText;
}

