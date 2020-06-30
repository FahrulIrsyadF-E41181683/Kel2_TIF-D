package com.example.bpbdjember;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

public class ProfilActivity extends AppCompatActivity {

    private static final String TAG= profile.class.getSimpleName();
    private Menu action;
    private Bitmap bitmap;

    //creating TextView
    TextView Username, Email, Nomer, Alamat, Password;
    //creating ImageView
    ImageView Profil;
    //creating button
    Button Button_editphoto;

    SessionManager sessionManager;
    String getId;
    String URL_EDIT =  "http://192.168.1.4/android_register/edit_detail.php";
    String URL_SAVE =  "http://192.168.1.4/android_register/read_detail.php";
    String URL_UPLOAD = "http://192.168.1.4/android_register/upload,php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profil);

        sessionManager = new SessionManager(this);
        sessionManager.checkLogin();



        //Assign ID's to TextView and button
        Username = (TextView) findViewById(R.id.username);
        Nama = (TextView) findViewById(R.id.nama);
        Email = (TextView) findViewById(R.id.email);
        Nomer = (TextView) findViewById(R.id.nomer);
        Alamat = (TextView) findViewById(R.id.alamat);
//        Password = (TextView) findViewById(R.id.password);
        EditButton = (Button) findViewById(R.id.button_edit);
        Button_editphoto = (Button)findViewById(R.id.button_editfoto);
        profile_image = (ImageView)findViewById(R.id.profile_image);

        HashMap<String, String> user = sessionManager.getUserDetail();
        getId = user.get(sessionManager.ID);


        //Receiving value into activity using intent
        String TempHolder1 = getIntent().getStringExtra("UsernameTAG");
//        String TempHolder2 = getIntent().getStringExtra("NamaTAG");
//        String TempHolder3 = getIntent().getStringExtra("AlamatTAG");
//        String TempHolder4 = getIntent().getStringExtra("NomerTAG");
//        String TempHolder5 = getIntent().getStringExtra("EmailTAG");
//        String TempHolder6 = getIntent().getStringExtra("PasswordTAG");
//
//        //Setting up received value into EditText
//        Username.setText(Username.getText() + TempHolder1);


        //Adding click listener to logout button
       Button_editphoto.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
               //Showing echo response message from server
               chooseFile();
            }
        });
    }
    private void getUserDetail(){
        final ProgressDialog progressDialog = new ProgressDialog(this);
        progressDialog.setMessage("Loading...");
        progressDialog.show();

        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_SAVE,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        progressDialog.dismiss();
                        Log.i(TAG, response.toString());
                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");
                            JSONArray jsonArray = jsonObject.getJSONArray("read");

                            if (success.equals("1")){
                                for (int i =0; i < jsonArray.length(); i++){
                                   JSONObject object = jsonArray.getJSONObject(i);
                                   String strUsername = object.getString("Username").trim();
                                    String strNama = object.getString("Nama").trim();
                                    String strAlamat = object.getString("Alamat").trim();
                                    String strNomer = object.getString("Nomer").trim();
                                    String strEmail = object.getString("Email").trim();

                                    Username.setText(strUsername);
                                    Nama.setText(strNama);
                                    Alamat.setText(strAlamat);
                                    Nomer.setText(strNomer);
                                    Email.setText(strEmail);
                                }
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                            progressDialog.dismiss();
                            Toast.makeText(profile.this, "Error Reading Detail" + e.toString(), Toast.LENGTH_SHORT).show();
                        }

                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                    progressDialog.dismiss();
                    Toast.makeText(profile.this, "Error reading Detail" +error.toString(), Toast.LENGTH_SHORT).show();

                    }
                })
        {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("id", getId);
                return params;

            }
        };
        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);


    }

    @Override
    protected void onResume() {
        super.onResume();
        getUserDetail();
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        MenuInflater menuInflater = getMenuInflater();
        menuInflater.inflate(R.menu.menu_action, menu);
        action = menu;
        action.findItem(R.id.menu_save).setVisible(false);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(@NonNull MenuItem item) {
        switch (item.getItemId()){
            case R.id.menu_edit:
                Username.setFocusableInTouchMode(true);
                Nama.setFocusableInTouchMode(true);
                Alamat.setFocusableInTouchMode(true);
                Nomer.setFocusableInTouchMode(true);
                Email.setFocusableInTouchMode(true);

                InputMethodManager imm = (InputMethodManager) getSystemService(Context.INPUT_METHOD_SERVICE);
                imm.showSoftInput(Username, InputMethodManager.SHOW_IMPLICIT);

                action.findItem(R.id.menu_edit).setVisible(false);
                action.findItem(R.id.menu_save).setVisible(true);

                return  true;
            case R.id.menu_save:
                SaveEditDetail();
                action.findItem(R.id.menu_edit).setVisible(true);
                action.findItem(R.id.menu_save).setVisible(false);

                Username.setFocusableInTouchMode(false);
                Nama.setFocusableInTouchMode(false);
                Alamat.setFocusableInTouchMode(false);
                Nomer.setFocusableInTouchMode(false);
                Email.setFocusableInTouchMode(false);

                Username.setFocusable(false);
                Nama.setFocusable(false);
                Alamat.setFocusable(false);
                Nomer.setFocusable(false);
                Email.setFocusable(false);
                return true;
            default:
                return  super.onOptionsItemSelected(item);
        }

    }

    private void SaveEditDetail() {
        final String Username = this.Username.getText().toString().trim();
        final String Nama = this.Nama.getText().toString().trim();
        final String Alamat = this.Alamat.getText().toString().trim();
        final String Nomer = this.Nomer.getText().toString().trim();
        final String Email = this.Email.getText().toString().trim();
        final String Id = getId;

        final ProgressDialog progressDialog = new ProgressDialog(this);
        progressDialog.setMessage("Menyimpan...");
        progressDialog.show();


        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_EDIT,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                    progressDialog.dismiss();
                        try {
                            JSONObject jsonObject= new JSONObject(response);
                            String success = jsonObject.getString("Sukses");

                            if (success.equals("1")){
                                Toast.makeText(profile.this, "Sukses", Toast.LENGTH_SHORT).show();
                                sessionManager.createSession(Username, Nama, Alamat, Nomer, Email, Id);
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                            Toast.makeText(profile.this, "Error"+e.toString(), Toast.LENGTH_SHORT).show();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(profile.this, "Error"+error.toString(), Toast.LENGTH_SHORT).show();
                    }
                })
        {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("Username", Username);
                params.put("Nama", Nama);
                params.put("Alamat", Alamat);
                params.put("Nomer", Nomer);
                params.put("Email", Email);
                params.put("Id", Id);
                return params;
            }
        };
        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }

        private void chooseFile(){
        Intent intent = new Intent();
        intent.setType("image/*");
        intent.setAction(Intent.ACTION_GET_CONTENT);
        startActivityForResult(Intent.createChooser(intent, "Pilih gambar"), 1);
        }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (requestCode == 1 && resultCode==RESULT_OK && data != null && data.getData() != null) {
            Uri filePath = data.getData();
            try {
                bitmap = MediaStore.Images.Media.getBitmap(getContentResolver(), filePath);
                profile_image.setImageBitmap(bitmap);
            }   catch (IOException e){
                e.printStackTrace();
            }
            UploadPicture(getId, getStringImage(bitmap));


        }
    }

    private void UploadPicture(final String id, final String gambar) {
        final ProgressDialog progressDialog = new ProgressDialog(this);
        progressDialog.setMessage("Uploading...");
        progressDialog.show();

        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_UPLOAD,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        progressDialog.dismiss();
                        Log.i(TAG, response.toString());
                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");
                            if (success.equals("1")){
                                Toast.makeText(profile.this, "Sukses", Toast.LENGTH_SHORT).show();
                            }
                        } catch (JSONException e){
                            e.printStackTrace();
                            progressDialog.dismiss();
                            Toast.makeText(profile.this, "Coba Lagi" + e.toString(), Toast.LENGTH_SHORT).show();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        progressDialog.dismiss();
                        progressDialog.dismiss();
                        Toast.makeText(profile.this, "Coba Lagi" + error.toString(), Toast.LENGTH_SHORT).show();
                    }
                })
        {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("id", id);
                params.put("gambar", gambar);
                return params;
            }
        };
        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);

    }
    public  String  getStringImage(Bitmap bitmap){
        ByteArrayOutputStream byteArrayOutputStream = new ByteArrayOutputStream();
        bitmap.compress(Bitmap.CompressFormat.JPEG, 100, byteArrayOutputStream);
        byte[] imageByteArray = byteArrayOutputStream.toByteArray();
        String encodedimage = Base64.encodeToString(imageByteArray, Base64.DEFAULT);
        return  encodedimage;
    }
}