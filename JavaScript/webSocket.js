let ws = new WebSocket("wss://api-pub.bitfinex.com/ws/2");          /* Bitfinex WebSoceket data */
let ws1 = new WebSocket("wss://api-pub.bitfinex.com/ws/2");
let ws2 = new WebSocket("wss://api-pub.bitfinex.com/ws/2");
let ws3 = new WebSocket("wss://api-pub.bitfinex.com/ws/2");
let ws4 = new WebSocket("wss://api-pub.bitfinex.com/ws/2");

let symblolBTC = "tBTCUSD";         /* Symbol for specific currency pair */
let idBTC = "btcusd";               /* By this id, executing code recognizes in which <td> tag will be set data */
getData(ws, symblolBTC, idBTC);     /* Call getData fucntion and pass parameters */


let symblolLTC = "tLTCBTC";
let idLTC = "ltcusd";
getData(ws1, symblolLTC, idLTC);


let symblolLTCU = "tLTCUSD";
let idLTCU = "ltcbtc";
getData(ws2, symblolLTCU, idLTCU);


let symblolETH = "tETHUSD";
let idLETH = "ethusd";
getData(ws3, symblolETH, idLETH);


let symblolETHB = "tETHBTC";
let idLETHB = "ethbtc";
getData(ws4, symblolETHB, idLETHB);


function getData(webSocket, symbol, id)         /* getData function dynamically sets data for first 5 currnecy pairs in <td> tags */
{
    webSocket.onopen = function(){
        webSocket.send(JSON.stringify({"event":"subscribe", "channel":"ticker", "symbol":symbol}))
    };
    
    webSocket.onmessage = function(msg){
    let response = JSON.parse(msg.data);
    let hb = response;

        if(hb instanceof Array && hb[1] !== "hb")
        {

            $("#last"+id).html(hb[1][6]);

            $("#change"+id).html(hb[1][4]);
            
            $("#change-per"+id).html(hb[1][5]* 100 +" %");
            
            $("#high"+id).html(hb[1][8]);
            
            $("#low"+id).html(hb[1][9]);
             
        }

    };  
}
