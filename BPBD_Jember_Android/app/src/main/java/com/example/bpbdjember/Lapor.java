package com.example.bpbdjember;

import android.content.Intent;
import android.os.Build;
import android.os.Bundle;
import android.text.Editable;
import android.text.TextWatcher;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;

import androidx.annotation.RequiresApi;
import androidx.appcompat.app.AppCompatActivity;

public class Lapor extends AppCompatActivity {

        private EditText namaField;
        private EditText alamatField;
        private EditText emailField;
        private EditText lokasiField;
        private EditText detailbencanaField;
        private RadioGroup kategoriField;
        private Button btn_submit;

        @Override
        protected void onCreate(Bundle savedInstanceState) {
            super.onCreate(savedInstanceState);
            setContentView(R.layout.lapor);

            namaField = findViewById(R.id.nama);
            alamatField = findViewById(R.id.alamat);
            emailField = findViewById(R.id.email);
            lokasiField = findViewById(R.id.lokasi);
            detailbencanaField = findViewById(R.id.detail_bencana);
            kategoriField = findViewById(R.id.kategori);
            btn_submit = findViewById(R.id.btn_submit);

            kategoriField.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    detailbencanaField.setVisibility(View.VISIBLE);
                }
            });
        }
        public void onSubmit(View v) {
            Intent intent = new Intent(this, MainActivity.class);
            int selectedId = kategoriField.getCheckedRadioButtonId();
            RadioButton selectedGender =(RadioButton)findViewById(selectedId);

            intent.putExtra("name_respondent",namaField.getText().toString());
            intent.putExtra("age_respondent", alamatField.getText().toString());
            intent.putExtra("gender_respondent", selectedGender.getText().toString());
            intent.putExtra("domicile_respondent", emailField.getText().toString());
            intent.putExtra("education_respondent", lokasiField.getText().toString());
            startActivity(intent);
        }
        @RequiresApi(api = Build.VERSION_CODES.LOLLIPOP)
        private void validateForm(){
            boolean isNamaNull = namaField.getText().toString().isEmpty();
            boolean isAlamatNull = alamatField.getText().toString().isEmpty();
            boolean isEmailNull = emailField.getText().toString().isEmpty();
            boolean isLokasiNull = lokasiField.getText().toString().isEmpty();
            int isChecked = kategoriField.getCheckedRadioButtonId();

            if (!(isNamaNull || isAlamatNull || isEmailNull || isLokasiNull) && (isChecked > 0)) {
                btn_submit.setBackground(getDrawable(R.drawable.button_lapor_on));
                btn_submit.setEnabled(true);
                btn_submit.setClickable(true);
            } else {
                btn_submit.setBackground(getDrawable(R.drawable.button_lapor_off));
                btn_submit.setEnabled(false);
                btn_submit.setClickable(false);
            }
            kategoriField.setOnCheckedChangeListener(new RadioGroup.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(RadioGroup group, int checkedId) {
                    validateForm();
                }
            });
            namaField.addTextChangedListener (new TextWatcher() {
                @Override
                public void beforeTextChanged(CharSequence charSequence, int i, int i1, int i2) {}
                @Override
                public void onTextChanged(CharSequence s, int i, int i1, int i2){
                    validateForm();
                }

                @Override
                public void afterTextChanged(Editable s) {}
                
            });
        }

    }

