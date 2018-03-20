package com.example.mehak.barcode_reader;

import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.util.SparseArray;
import android.widget.Toast;

import com.google.android.gms.vision.barcode.Barcode;

import java.io.BufferedOutputStream;
import java.io.BufferedWriter;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.List;

import info.androidhive.barcode.BarcodeReader;

public class MainActivity extends AppCompatActivity implements BarcodeReader.BarcodeReaderListener {

    BarcodeReader barcodeReader;
    String passedMessage;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        // get the barcode reader instance
        barcodeReader = (BarcodeReader) getSupportFragmentManager().findFragmentById(R.id.barcode_scanner);

        Intent intent = getIntent();
        passedMessage = intent.getStringExtra("tollId");
        Log.e("msg",passedMessage);
        //((PassingData)this).passingTollId(passedMessage);
        Toast.makeText(this, passedMessage, Toast.LENGTH_SHORT).show();
        Log.e("msg",passedMessage);



    }

    @Override
    public void onScanned(Barcode barcode) {

        barcodeReader.playBeep();
        Log.v("Value",barcode.displayValue);
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

        public CallAPI(){
            //set context variables if required
        }

        @Override
        protected void onPreExecute() {
            super.onPreExecute();
        }


        @Override
        protected String doInBackground(String... param) {

            String urlString = "http://eb059f31.ngrok.io/api/toll/comingVehicle.php"; // URL to call
            String userId = param[0]; //data to post
            //String tollId = param[1];
            OutputStream out = null;
            try {

                URL url = new URL(urlString);
                HttpURLConnection urlConnection = (HttpURLConnection) url.openConnection();
                urlConnection.setRequestMethod("POST");
                urlConnection.setRequestProperty("userId",userId);
                urlConnection.setRequestProperty("tollId",passedMessage);
                urlConnection.setDoOutput(true);
                Log.w("Value",userId);
                Log.w("Value",passedMessage);
                out = new BufferedOutputStream(urlConnection.getOutputStream());

                /*writeStream(out);
                out.flush();
                out.close();*/

                BufferedWriter writer = new BufferedWriter (new OutputStreamWriter(out, "UTF-8"));
                writer.write(userId);
                writer.write(passedMessage);
                writer.flush();
                writer.close();
                out.close();
                urlConnection.connect();


            } catch (Exception e) {

                System.out.println(e.getMessage());

            }
            return null;

        }
    }
}
