import React from 'react';
import { useForm } from '@inertiajs/react';

export default function Dashboard({ documents }) {
  const uploadForm = useForm({ document: null });
  const accessForm = useForm({ access_code: '' });

  function upload(e) {
    e.preventDefault();
    uploadForm.post(route('documents.upload'));
  }

  function access(e) {
    e.preventDefault();
    accessForm.post(route('documents.access'));
  }

  return (
    <div className="grid grid-cols-1 md:grid-cols-2 gap-6">

      {/* Documents */}
      <div className="bg-white rounded-xl shadow p-6">
        <h2 className="text-lg font-semibold mb-4">📂 My Documents</h2>
        <ul className="space-y-2">
          {documents.map(d => (
            <li key={d.id} className="flex justify-between border-b pb-2">
              <span>{d.name}</span>
              <a href={route('documents.download', d.id)} 
                 className="text-sm text-indigo-600 hover:underline">Download</a>
            </li>
          ))}
        </ul>
      </div>

      {/* Upload */}
      <div className="bg-white rounded-xl shadow p-6">
        <h2 className="text-lg font-semibold mb-4">⬆️ Upload Document</h2>
        <form onSubmit={upload} className="space-y-3">
          <input type="file" name="document"
            onChange={e => uploadForm.setData('document', e.target.files[0])}
            className="w-full border rounded p-2"
          />
          <button disabled={uploadForm.processing}
            className="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">
            Upload
          </button>
        </form>
      </div>

      {/* Access shared docs */}
      <div className="bg-white rounded-xl shadow p-6 md:col-span-2">
        <h2 className="text-lg font-semibold mb-4">🔑 Access Shared Document</h2>
        <form onSubmit={access} className="flex space-x-3">
          <input type="text"
            value={accessForm.data.access_code}
            onChange={e => accessForm.setData('access_code', e.target.value)}
            className="flex-1 border rounded p-2"
            placeholder="Enter share code"
          />
          <button disabled={accessForm.processing}
            className="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
            Access
          </button>
        </form>
      </div>
    </div>
  );
}
