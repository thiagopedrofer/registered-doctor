<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use App\Models\Doctor;
use App\Models\Specialty;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Request;

class DoctorController extends Controller
{
    public function index():View
    {
        $doctors = Doctor::query()->orderBy('name')->paginate();

        return view('doctors.index', [
            'doctors' => $doctors
        ]);
    }

    public function create():View
    {
        return view('doctors.create');
    }

    public function store(DoctorRequest $request)
    {
        DB::beginTransaction();

        /** @var Doctor $doctor */
        $doctor = Doctor::query()->create([
            'name' => $request->input('name'),
            'crm' => $request->input('crm'),
            'phone' => $request->input('phone'),
            'zip' => $request->input('zip'),
            'uf' => $request->input('uf'),
            'city' => $request->input('city'),
            'neighborhood' => $request->input('neighborhood'),
            'street' => $request->input('street'),
            'complement' => $request->input('complement')
        ]);

        $doctor->specialties()->attach($request->input('specialties'));
        DB::commit();

        return redirect()->route('doctors.index')->with('message', 'Médico cadastrado com sucesso');
    }

    public function show($id)
    {
        $doctor = Doctor::with('specialties')->find($id);

        if (!$doctor) {
            return redirect(route('doctors.index'));
        }

        return view('doctors.show',compact('doctor'));
    }

    public function destroy($id)
    {
        $doctor = Doctor::find($id);

        if (!$doctor) {
            return redirect(route('doctors.index'));
        }

        $doctor->specialties()->detach();
        $doctor->delete();

        return redirect()->route('doctors.index')->with('message', 'Médico deletado com sucesso');
    }

    public function edit($id)
    {
        $doctor = Doctor::find($id);

        if (!$doctor) {
            return redirect(route('doctors.index'));
        }

        $doctorSpecialties = $doctor->specialties->pluck('id')->toArray();

        return view('doctors.create',compact('doctor', 'doctorSpecialties'));
    }

    public function update(DoctorRequest $request, $id)
    {
        /** @var Doctor $doctor */
        $doctor = Doctor::find($id);

        if (!$doctor) {
            return redirect(route('doctors.index'));
        }

        $doctor->update($request->all());
        $doctor->specialties()->sync($request->input('specialties'));

        return redirect()->route('doctors.index')->with('message', 'Médico editado com sucesso');
    }

    public function search(Request $request)
    {
        $doctors = Doctor::query()->where('name','LIKE', "%{$request->search}%")
            ->orWhere('crm','LIKE',"%{$request->search}%")
            ->paginate();

        return view('doctors.index',compact('doctors'));
    }

    public function getAddressByCep(string $zip)
    {
        $response = Http::get("https://viacep.com.br/ws/$zip/json/");

        return $response->json();
    }
}
