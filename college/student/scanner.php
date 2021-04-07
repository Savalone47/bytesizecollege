<!DOCTYPE html>
<html>
<body>
    <script src="https://cdn.jsdelivr.net/npm/dynamsoft-javascript-barcode@7.5.0-v1/dist/dbr.js" data-productKeys="PRODUCT-KEYS"></script>
    <script>
        let scanner = null;
        (async()=>{
            scanner = await Dynamsoft.BarcodeScanner.createInstance();
            scanner.onFrameRead = results => {console.log(results);};
            scanner.onUnduplicatedRead = (txt, result) => {alert(txt);};
            await scanner.show();
        })();
    </script>
</body>
</html>