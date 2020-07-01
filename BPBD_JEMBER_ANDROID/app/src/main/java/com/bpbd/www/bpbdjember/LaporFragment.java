package com.bpbd.www.bpbdjember;

import android.app.ProgressDialog;
import android.os.Build;
import android.os.Bundle;

import androidx.annotation.RequiresApi;
import androidx.fragment.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.bpbd.www.bpbdjember.helper.AdapterKategori;
import com.bpbd.www.bpbdjember.helper.DataKategori;
import com.bpbd.www.bpbdjember.helper.SessionManager;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.Objects;


public class LaporFragment extends Fragment {
    private EditText nama, alamat, email, lokasi, detail_laporan;
    private Spinner spinnerKategori;
    private Button btn_submit;
    private List<DataKategori> listKategori = new ArrayList<DataKategori>();
    private String BaseUrl;
    private ProgressDialog progressDialog;
    private AdapterKategori adapter;
    private SessionManager sessionManager;
    @RequiresApi(api = Build.VERSION_CODES.KITKAT)
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_lapor, container, false);
        nama = view.findViewById(R.id.nama);
        alamat = view.findViewById(R.id.alamat);
        email = view.findViewById(R.id.email);
        lokasi = view.findViewById(R.id.lokasi);
        spinnerKategori = view.findViewById(R.id.spinnerKategori);
        detail_laporan = view.findViewById(R.id.detail_laporan);
        sessionManager = new SessionManager(getContext());
        progressDialog = new ProgressDialog(getContext());
        BaseUrl = sessionManager.BASE_URL;

        spinnerKategori.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                Toast.makeText(getContext(),"Kategori yang kamu pilih :" + listKategori.get(position).getKategori(), Toast.LENGTH_LONG).show();
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {

            }
        });
        adapter = new AdapterKategori(getActivity(), listKategori);
        spinnerKategori.setAdapter(adapter);
        callData();
        return view;
    }
    @RequiresApi(api = Build.VERSION_CODES.KITKAT)
    private void callData() {

        listKategori.clear();

        progressDialog.setMessage("Loading...");
        progressDialog.show();
        showDialog();

        String URL_KATEGORI = BaseUrl + "api/lapor/getKategori";
        StringRequest stringRequest = new StringRequest(Request.Method.GET, URL_KATEGORI,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        progressDialog.dismiss();

                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String status = jsonObject.getString("status");
                            String error = jsonObject.getString("error");
                            if (status.equals("200")) {
                                JSONArray jsonArray = jsonObject.getJSONArray("data");
                                for (int i=0; i < jsonArray.length(); i++){
                                    JSONObject object = jsonArray.getJSONObject(i);

                                    DataKategori dataKategori = new DataKategori();

                                    dataKategori.setId(object.getString("ID_KTR"));
                                    dataKategori.setKategori(object.getString("KATEGORI"));

                                    listKategori.add(dataKategori);
                                }
                                adapter.notifyDataSetChanged();
                                hideDialog();
                            }else{
                                Toast.makeText(getContext(), "Tidak dapat memuat data", Toast.LENGTH_LONG).show();
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                            Toast.makeText(getContext(), "Error" + e.toString(), Toast.LENGTH_LONG).show();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        progressDialog.dismiss();
                        hideDialog();
                        Toast.makeText(getContext(), "Error Response " + error.toString(), Toast.LENGTH_LONG).show();
                    }

                })
        {
            @Override
            protected Map<String, String> getParams(){
                Map<String, String> params = new HashMap<>();
                params.put("Content-Type","application/x-www-form-urlencoded");
                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(Objects.requireNonNull(getContext()));
        requestQueue.add(stringRequest);

    }
    private void showDialog() {
        if (!progressDialog.isShowing())
            progressDialog.show();
    }


    private void hideDialog() {
        if (progressDialog.isShowing())
            progressDialog.dismiss();
    }


}
