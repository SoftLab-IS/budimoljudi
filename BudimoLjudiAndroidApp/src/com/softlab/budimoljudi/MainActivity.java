package com.softlab.budimoljudi;

import com.softlab.budimoljud.R;

import android.app.Activity;
import android.os.Bundle;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;

public class MainActivity extends Activity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        
        WebView myWebView = (WebView) findViewById(R.id.webView1);
        myWebView.loadUrl("http://budimoljudi.com/");
        WebSettings webSettings = myWebView.getSettings();
        webSettings.setJavaScriptEnabled(true);
        
    }
}

class MyWebViewClient extends WebViewClient {
    public boolean shouldOverrideUrlLoading(WebView view, String url) {
        if(url.contains("budimoljudi")){ // Could be cleverer and use a regex
            return super.shouldOverrideUrlLoading(view, "http://budimoljudi.com/"); // Leave webview and use browser
        } else {
            view.loadUrl("http://budimoljudi.com/"); // Stay within this webview and load url
            return true;
        }
    }
}