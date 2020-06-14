import pdfkit

options = {

    'encoding':'UTF-8',
    'margin-top':'0',
    'margin-bottom':'0',
    'margin-left':'0',
    'margin-right':'0',
    'user-style-sheet':'styles.css',
    'enable-smart-shrinking': ''
}

pdf = pdfkit.from_file("usercontent.html","cv4.pdf",options=options)