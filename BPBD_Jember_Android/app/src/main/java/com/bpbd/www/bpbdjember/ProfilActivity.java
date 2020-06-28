package com.bpbd.www.bpbdjember;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

public class ProfilActivity extends AppCompatActivity {

    //creating TextView
    TextView Username, Email, Nomer, Alamat, Password;
    //creating ImageView
    ImageView Profil;
    //creating button
    Button EditButton;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profil);

        //Assign ID's to TextView and button
        Username = (TextView) findViewById(R.id.TextViewUsername);
        Email = (TextView) findViewById(R.id.TextViewEmail);
        Nomer = (TextView) findViewById(R.id.TextViewNomer);
        Alamat = (TextView) findViewById(R.id.TextViewAlamat);
        Password = (TextView) findViewById(R.id.TextViewPassword);
        EditButton = (Button) findViewById(R.id.button_edit);

        //Receiving value into activity using intent
        String TempHolder = getIntent().getStringExtra("UsernameTAG");
        //Setting up received value into EditText
        Username.setText(Username.getText() + TempHolder);

        //Adding click listener to logout button
        EditButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                //Showing echo response message from server
                Toast.makeText(ProfilActivity.this, "", Toast.LENGTH_LONG).show();

                //Closing the current activity
                finish();

                //Redirect to Main Activity after logout
//                Intent intent = new Intent(ProfilActivity.this, EditProfil.class);
//                startActivity(intent);
            }
        });
    }
}