# BitTurk API Documentation
The documentation for BitTurk.com website

## Usage

Our API base url https://api.bitturk.com/v1/



## Questions & Problems

Please use the [issues](https://github.com/BitTurk/BitTurkAPI/issues) on this github project to ask questions and report bugs.



## Request Limits

* All requests are limited to 1 request per 1 second.



## Ping

<code>GET</code> [https://api.bitturk.com/v1/ping]



## Server Time
<code>GET</code> [https://api.bitturk.com/v1/time]



## Ticker
<code>GET</code> [https://api.bitturk.com/v1/ticker]


## Order Book
<code>GET</code> [https://api.bitturk.com/v1/orderbook?Pair=BTCTRY]

<code>Pair</code> parameter: <code>BTCTRY</code>, <code>ETHTRY</code>, <code>XRPTRY</code>, <code>LTCTRY</code>,  <code>NEOTRY</code>, <code>XMRTRY</code>, <code>DASHTRY</code>

## Last Transactions
<code>GET</code> [https://api.bitturk.com/v1/transactions?Pair=BTCTRY]

<code>Pair</code> parameter: <code>BTCTRY</code>, <code>ETHTRY</code>, <code>XRPTRY</code>, <code>LTCTRY</code>,  <code>NEOTRY</code>, <code>XMRTRY</code>, <code>DASHTRY</code>



## User Wallet
<code>GET</code> [https://api.bitturk.com/v1/userwallet?Symbol=BTC]

<code>Symbol</code> parameter: <code>BTC</code>, <code>ETH</code>, <code>XRP</code>, <code>LTC</code>,  <code>NEO</code>, <code>XMR</code>, <code>DASH</code>



## User Transactions
<code>GET</code> [https://api.bitturk.com/v1/usertransactions?Pair=BTCTRY&Offset=0&Limit=10&Sort=asc]

<code>Pair</code> parameter: <code>BTCTRY</code>, <code>ETHTRY</code>, <code>XRPTRY</code>, <code>LTCTRY</code>,  <code>NEOTRY</code>, <code>XMRTRY</code>, <code>DASHTRY</code>



## User Closed Orders
<code>GET</code> [https://api.bitturk.com/v1/userclosedorders?Pair=BTCTRY&Offset=0]

<code>Pair</code> parameter: <code>BTCTRY</code>, <code>ETHTRY</code>, <code>XRPTRY</code>, <code>LTCTRY</code>,  <code>NEOTRY</code>, <code>XMRTRY</code>, <code>DASHTRY</code>



## User Open Orders
<code>GET</code> [https://api.bitturk.com/v1/useropenorders?Pair=BTCTRY]

<code>Pair</code> parameter: <code>BTCTRY</code>, <code>ETHTRY</code>, <code>XRPTRY</code>, <code>LTCTRY</code>,  <code>NEOTRY</code>, <code>XMRTRY</code>, <code>DASHTRY</code>



## User Cancel Order
<code>GET</code> [https://api.bitturk.com/v1/userordercancel?Pair=BTCTRY&OrderId=1234]

<code>Pair</code> parameter: <code>BTCTRY</code>, <code>ETHTRY</code>, <code>XRPTRY</code>, <code>LTCTRY</code>,  <code>NEOTRY</code>, <code>XMRTRY</code>, <code>DASHTRY</code>


## User Create Order
<code>GET</code> [https://api.bitturk.com/v1/userordercreate?Pair=BTCTRY&Price=0.1&Lot=1.0&Type=buy]

<code>Pair</code> parameter: <code>BTCTRY</code>, <code>ETHTRY</code>, <code>XRPTRY</code>, <code>LTCTRY</code>,  <code>NEOTRY</code>, <code>XMRTRY</code>, <code>DASHTRY</code>



