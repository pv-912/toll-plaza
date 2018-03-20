package com.example.mehak.barcode_reader;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class StartActivity extends AppCompatActivity implements PassingData {

    String num="";
    Button okButton;
    EditText tollEdit;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_start);

        tollEdit = (EditText)findViewById(R.id.tollId);
        okButton = (Button)findViewById(R.id.okBtn);
        //num = tollEdit.getText().toString().trim();

        num = "1";
        okButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(num.isEmpty()){
                    Toast.makeText(StartActivity.this,"Please insert toll Id",Toast.LENGTH_SHORT).show();
                }
                else{
                    Log.w("Id",num);
                    Intent barcodeReader = new Intent(StartActivity.this,MainActivity.class);
                    barcodeReader.putExtra("tollId",num);
                    startActivity(barcodeReader);



                }
            }
        });
    }

    @Override
    public void passingTollId(String tollId) {

    }
}
