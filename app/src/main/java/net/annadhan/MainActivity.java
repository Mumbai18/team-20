package net.annadhan;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;

public class MainActivity extends AppCompatActivity {

    //Declare inside class
    WebView wvWebsite;
    String url = "http://www.google.com";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        //Bind inside onCreate()
        wvWebsite = (WebView) findViewById(R.id.wvWebsite);
        WebSettings webSettings = wvWebsite.getSettings();
        webSettings.setJavaScriptEnabled(true);
        wvWebsite.setWebViewClient(new WebViewClient());
        wvWebsite.loadUrl(url);
    }
}
