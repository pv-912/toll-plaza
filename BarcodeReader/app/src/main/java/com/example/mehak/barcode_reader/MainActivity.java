package com.example.mehak.barcode_reader;

import android.content.Context;
import android.content.Intent;
import android.net.Uri;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.util.SparseArray;
import android.widget.Toast;

import com.google.android.gms.vision.barcode.Barcode;

import java.io.BufferedOutputStream;
import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.ProtocolException;
import java.net.URL;
import java.util.List;

import info.androidhive.barcode.BarcodeReader;

import static android.content.ContentValues.TAG;

public class MainActivity extends AppCompatActivity implements BarcodeReader.BarcodeReaderListener {

    BarcodeReader barcodeReader;
    String passedMessage;
    String urlString = "http://0b6c3cd1.ngrok.io/api/toll/comingVehicle.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        // get the barcode reader instance
        barcodeReader = (BarcodeReader) getSupportFragmentManager().findFragmentById(R.id.barcode_scanner);

        Intent intent = getIntent();
        passedMessage = intent.getStringExtra("tollId");
        Log.e("msg", passedMessage);
        //((PassingData)this).passingTollId(passedMessage);
        Toast.makeText(this, passedMessage, Toast.LENGTH_SHORT).show();
        Log.e("msg", passedMessage);


    }

    @Override
    public void onScanned(Barcode barcode) {

        barcodeReader.playBeep();
        Log.v("Value", barcode.displayValue);
        CallAPI callTask = new CallAPI();
        callTask.execute(barcode.displayValue);

    }

    @Override
    public void onScannedMultiple(List<Barcode> barcodes) {

    }

    @Override
    public void onBitmapScanned(SparseArray<Barcode> sparseArray) {

    }

    @Override
    public void onScanError(String errorMessage) {

        Toast.makeText(getApplicationContext(), "Error occurred while scanning " + errorMessage, Toast.LENGTH_SHORT).show();

    }

    @Override
    public void onCameraPermissionDenied() {

        finish();
    }

    public class CallAPI extends AsyncTask<String, String, String> {

        public CallAPI() {
            //set context variables if required
        }

        @Override
        protected void onPreExecute() {
            super.onPreExecute();
        }


        @Override
        protected String doInBackground(String... param) {

            HttpURLConnection urlConnection = null;
            BufferedReader reader = null;
            Uri uri;

            // URL to call
            String userId = param[0]; //data to post
            //String tollId = param[1];
            OutputStream out = null;
            uri = Uri.parse(urlString).buildUpon().
                    appendQueryParameter("tollId", passedMessage).
                    appendQueryParameter("userId", userId).
                    build();
            Log.w(TAG, uri.toString());
            try {

                URL url = new URL(uri.toString());
                urlConnection = (HttpURLConnection) url.openConnection();
                urlConnection.setRequestMethod("GET");
                urlConnection.connect();
                Log.w("Value", userId);
                Log.w("Value", passedMessage);

                InputStream inputStream = urlConnection.getInputStream();
                StringBuilder buffer = new StringBuilder();
                if (inputStream == null) {
                    return null;
                }
                reader = new BufferedReader(new InputStreamReader(inputStream));
                String line;
                while ((line = reader.readLine()) != null) {
                    // Since it's JSON, adding a newline isn't necessary (it won't affect parsing)
                    // But it does make debugging a *lot* easier if you print out the completed
                    // buffer for debugging.
                    buffer.append(line + "\n");
                }
                if (buffer.length() == 0) {
                    // Stream was empty.  No point in parsing.
                    return null;
                }

            } catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (ProtocolException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            } finally {
                if (urlConnection != null) {
                    urlConnection.disconnect();
                }
                if (reader != null) {
                    try {
                        reader.close();
                    } catch (final IOException e) {
                        Log.e(TAG, "Error closing stream", e);
                    } catch (Exception e)

                    {

                        System.out.println(e.getMessage());

                    }

                }



            }
            return null;
        }
    }
}
