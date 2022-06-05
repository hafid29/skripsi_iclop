mix
    .js('resources/js/hljs.js', 'public/js')
    .sass('resources/css/app.scss', 'public/css');
    
import hljs from 'highlight.js';

setTimeout(function () {
    document
        .querySelectorAll('pre')
        .forEach((block) => hljs.highlightElement(block));
}, 1000);