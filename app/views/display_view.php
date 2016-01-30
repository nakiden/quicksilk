<?php

    extract($data);

    require 'FileXMLHandler.php';

    FileXMLHandler:: saveXMLdocumentToFile($books,$data['currentPage']);

    echo '<p id="currentPage" style="visibility: hidden;">'.$data['currentPage'].'</p>';

    require '/data/tableResult.html';

    require '/data/paginator.html';

