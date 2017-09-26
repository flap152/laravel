const fetchAndLog = async (url) => {
    console.log('info', `Requesting ${url}...`);
    try {
        const response = await fetch(url);
        const text = await response.text();
        console.log('info', `...the response for ${url} is :` + text.substr(0,1250) );
    } catch(error) {
        log('warn', `...fetch failed due to '${error}'.`);
    }
};

/**
 * Any precached assets that are updated will automatically generate a message
 * using the BroadcastChannel API. Our page can listen for this message and
 * find out what was updated.
 */
const precacheUpdates = new BroadcastChannel('precache-updates');
precacheUpdates.addEventListener('message', (event) => {
    log('info', `${event.data.payload.url} was updated.
      The new value will be used the next time a request is made.`);
});

const httpBinImgElement = document.querySelector('#httpbinimage');
const httpBinImageFormats = ['b1', 'b2' , 'b3', 'b4'];

const PdfElement = document.querySelector('#pdffile');
const PdfNames = ['2017/2017-09-05-b4', 'b2' ];


const buttonHandlers = {
    precached: () => fetchAndLog('precached.txt'),
    hello: () => fetchAndLog('hello.txt'),
    notmatched: () => fetchAndLog('not-matched.dat'),
    delay: () => fetchAndLog(
        `https://httpbin.org/delay/${Math.floor(Math.random() * 5) + 1}`),
    image: () => {
        const nextImageFormat = httpBinImageFormats.shift(httpBinImageFormats);
        httpBinImageFormats.push(nextImageFormat);
        httpBinImgElement.src = `https://homestead.app/img/${nextImageFormat}.jpg`;
        const nextPdfFile = PdfNames[Math.floor(Math.random() * 2) + 0 ];//PdfNames.shift(PdfNames);
        console.log('info - next is: '+nextPdfFile);
        PdfNames.push(nextPdfFile);
        PdfElement.src = `/pdfs/${nextPdfFile}.pdf`;
    },
};


const buttons = document.querySelectorAll('button');
/* Disable inexistent buttons
for (let button of [...buttons]) {
    button.addEventListener('click', buttonHandlers[button.id]);
}*/

