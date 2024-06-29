<?php
namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingsController extends Controller
{
    public function ratings()
    {
        $ratings = Rating::with(['user', 'course'])->paginate(5);
        return view('admin.rating.ratings', compact('ratings'));
    }

    public function editrating($id)
    {
        $data = Rating::findOrFail($id);
        return view('admin.rating.edit-rating', compact('data'));
    }

    public function updaterating(Request $request, $id)
    {
        $data = Rating::findOrFail($id);

        $validatedData = $request->validate([
            'review' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $data->review = $validatedData['review'];
        $data->rating = $validatedData['rating'];
        $data->save();

        return redirect()->route('ratings')->with('success', 'Cập nhật thành công');
    }

    public function delete($id)
    {
        $data = Rating::find($id);

        if ($data) {
            $data->delete();
            return redirect()->route('ratings')->with('success', 'Xóa thành công');
        } else {
            return redirect()->route('ratings')->with('error', 'Không tìm thấy đánh giá');
        }
    }

    public function saveRating(Request $request)
{
    // Validate form data
    $validatedData = $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'opinion' => 'required|string',
    ]);

    // Create a new Rating instance
    $rating = new Rating();
    $rating->user_id = auth()->user()->id;
    $rating->course_id = $request->course_id; // Assuming you pass the course ID in the request
    $rating->review = $validatedData['opinion'];
    $rating->rating = $validatedData['rating'];
    $rating->status = 1; // Set the status to active
    $rating->save();

    // Optionally, you can return a response or redirect the user
    return redirect()->back()->with('success', 'Đã gửi đánh giá thành công!');
}


// public function showrating()
// {
//     $showrating = Rating::all(); // Adjust with your actual query to fetch ratings
//     return view('home')->with('showrating', $showrating);
// }

}




