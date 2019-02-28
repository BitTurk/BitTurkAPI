using System;
using System.IO;
using System.Security.Cryptography;
using System.Text;

public class Sample
{
    public static void Main()
    {		
        //You can create the API key from [https://bitturk.com/api] page in your exchange account. You should logged in to create API keys.
        var yourAPIKey = "";
        var yourAPISecret = "";

        string content = CallUrl("https://api.bitturk.com/v1/userwallet?Symbol=BTC", yourAPIKey, yourAPISecret);
        Console.WriteLine("Result: " + content);
    }


    public static string CallUrl(String url,String yourAPIKey, String yourAPISecret)
    {
        var timeSpan = (DateTime.UtcNow - new DateTime(1970, 1, 1, 0, 0, 0));
        var unixTime = (long)timeSpan.TotalSeconds;

        string signature = string.Empty;
        string message = yourAPIKey + unixTime;

        using (HMACSHA256 hmac = new HMACSHA256(Encoding.UTF8.GetBytes(yourAPISecret)))
        {
          byte[] signatureBytes = hmac.ComputeHash(Encoding.UTF8.GetBytes(message));
          signature = Convert.ToBase64String(signatureBytes);
        }

        var request = (System.Net.HttpWebRequest) System.Net.WebRequest.Create(url);
        request.Timeout = 20000;
        request.Method = "GET";
        request.Headers.Add("X-ApiKey", yourAPIKey);
        request.Headers.Add("X-Nonce", unixTime.ToString());
        request.Headers.Add("X-Signature", signature);		
        request.ContentType = "application/json";
        request.Accept = "application/json";

        try
        {
            var httpResponse = (System.Net.HttpWebResponse) request.GetResponse();
            using (var streamReader = new StreamReader(httpResponse.GetResponseStream()))
            {
                var result = streamReader.ReadToEnd();						
                return result;
            }
        }
        catch (System.Net.WebException e)
        {
              return e.Message;
        }
    }
}
