function parseFromXMLdocument() {

    var tag, node, i, nodesLength, xmlDoc;
    var Connect = new XMLHttpRequest();
    // Define which file to open and
    // send the request.
    Connect.open("GET", "/data/pagebooks.xml", false);
    Connect.setRequestHeader("Content-Type", "text/xml");
    Connect.send(null);

    // Place the response in an XML document.
    xmlDoc = Connect.responseXML;
    // put array length to variable
    var length = xmlDoc.getElementsByTagName("book").length;

    // render some page
    document.write('<link rel="stylesheet" type="text/css" href="/css/style.css" />');
    document.write("<div id='results_box'><table id='result_table'>");
    document.write("<tr id='table_header'><td>Title</td><td>Author</td><td>Pages</td><td>Language</td></tr>");

    // write data from xml to table
    for (var j = 0; j < length; j++) {
        tag = xmlDoc.getElementsByTagName("book")[j];
        nodesLength = tag.childNodes.length;
        node = tag.firstChild;
        document.write('<tr>');
        for (i = 0; i < nodesLength; i++) {
            if (node.nodeType == 1 && node.textContent != '') {
                document.write('<td>' + node.textContent + "</td>");
            }
            node = node.nextSibling;
        }
    }

    document.write('</table></div>');
}

