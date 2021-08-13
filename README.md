# BitTurk API Documentation
The documentation for BitTurk.com website

## Usage

Our API base url https://api.bitturk.com/v1/



## Questions & Problems

Please use the [issues](https://github.com/BitTurk/BitTurkAPI/issues) on this github project to ask questions and report bugs.



## Request Limits

* If you make more consequent unauthorized requests your API key will be blocked


## Ping
You can check API connection with ping url

<code>GET</code> [https://api.bitturk.com/v1/ping]



## Server Time
Current server time

<code>GET</code> [https://api.bitturk.com/v1/time]


## Exchange Info
<code>GET</code> [https://api.bitturk.com/v1/exchangeinfo]


## Ticker
<code>GET</code> [https://api.bitturk.com/v1/ticker]


## Order Book
<code>GET</code> [https://api.bitturk.com/v1/orderbook?Pair=BTCTRY]

<code>Pair</code> parameter: <code>You can get available pair from [https://api.bitturk.com/v1/exchangeinfo]</code>

## Last Transactions
<code>GET</code> [https://api.bitturk.com/v1/transactions?Pair=BTCTRY]

<code>Pair</code> parameter: <code>You can get available pair from [https://api.bitturk.com/v1/exchangeinfo]</code>





## API Authentication

All API calls related to a user account require authentication.

You need to provide 3 parameters to authenticate a request:

* "X-ApiKey": API key
* "X-Nonce": Nonce
* "X-Signature": Signature

#### API key

You can create the API key from [https://bitturk.com/api] page in your exchange account. You should logged in to create API keys.

#### Nonce

Nonce is a regular integer number. It must be increasing with every request you make.

A common practice is to use unix time for that parameter.

#### Signature

Signature is a HMAC-SHA256 encoded message. The HMAC-SHA256 code must be generated using a private key that contains a timestamp and your API key

Example (C#):
```c#

var timeSpan = (DateTime.UtcNow - new DateTime(1970, 1, 1, 0, 0, 0));
var unixTime = (long)timeSpan.TotalSeconds;

string message = yourAPIKey + unixTime;
using (HMACSHA256 hmac = new HMACSHA256(Encoding.UTF8.GetBytes(yourAPISecret)))
{
   byte[] signatureBytes = hmac.ComputeHash(Encoding.UTF8.GetBytes(message));
   string Signature = Convert.ToBase64String(signatureBytes));
}
```

After creating the parameters, you have to send them in the HTML Header of your request with their name

Example (C#):
```c#
client.DefaultRequestHeaders.Add("X-ApiKey", yourAPIKey);
client.DefaultRequestHeaders.Add("X-Nonce", unixTime.ToString());
client.DefaultRequestHeaders.Add("X-Signature", Signature);
```






Example (PHP):
```PHP
$now = time();
$PlainText = yourAPIKey.$now;
$HMACKey = yourAPISecret;
$Hashed = hash_hmac('sha256', $PlainText, $HMACKey, true);
$Signature = base64_encode($Hashed);
```


Warning: Your IP address can be blocked if you make too many unauthorized requests. Make sure you implement the authentication method properly.



## User Wallet
<code>GET</code> [https://api.bitturk.com/v1/userwallet?Symbol=BTC]

<code>Symbol</code> parameter: <code>BTC</code>, <code>ETH</code>, <code>XRP</code>, <code>LTC</code>,  <code>NEO</code>, <code>XMR</code>, <code>DASH</code>, <code>TRY</code>



## User Transactions
<code>GET</code> [https://api.bitturk.com/v1/usertransactions?Pair=BTCTRY&Offset=0&Limit=10&Sort=asc]

<code>Pair</code> parameter: <code>You can get available pair from [https://api.bitturk.com/v1/exchangeinfo]</code>

<code>Sort</code> parameter: <code>asc</code>, <code>desc</code>


## User Closed Orders
<code>GET</code> [https://api.bitturk.com/v1/userclosedorders?Pair=BTCTRY&Offset=0]

<code>Pair</code> parameter: <code>You can get available pair from [https://api.bitturk.com/v1/exchangeinfo]</code>



## User Open Orders
<code>GET</code> [https://api.bitturk.com/v1/useropenorders?Pair=BTCTRY]

<code>Pair</code> parameter: <code>You can get available pair from [https://api.bitturk.com/v1/exchangeinfo]</code>



## User Cancel Order
<code>GET</code> [https://api.bitturk.com/v1/userordercancel?Pair=BTCTRY&OrderId=1234]

<code>Pair</code> parameter: <code>You can get available pair from [https://api.bitturk.com/v1/exchangeinfo]</code>

<code>OrderId</code> parameter: <code>You can get Order Id from Open Order list api</code>



## User Create Order
<code>GET</code> [https://api.bitturk.com/v1/userordercreate?Pair=BTCTRY&Price=0.1&Lot=1.0&Type=buy]

<code>Pair</code> parameter: <code>You can get available pair from [https://api.bitturk.com/v1/exchangeinfo]</code>

<code>Type</code> parameter: <code>buy</code>, <code>sell</code>


