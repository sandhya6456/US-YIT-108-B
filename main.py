from fastapi import FastAPI, File, UploadFile
from fastapi.responses import HTMLResponse
from fastapi.middleware.cors import CORSMiddleware
import shutil

app = FastAPI()

# Add CORS middleware to allow all origins (you can customize this based on your needs)
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],  # Allow all origins, you may want to restrict this in production
    allow_credentials=True,
    allow_methods=["*"],  # Allow all methods (GET, POST, etc.)
    allow_headers=["*"],  # Allow all headers
)

@app.post("/uploadfile/")
async def create_upload_file(file: UploadFile = File(...)):
    # Save the uploaded file
    with open(file.filename, "wb") as buffer:
        shutil.copyfileobj(file.file, buffer)

    # Process the file (in this case, just return the same image)
    output_filename = f"processed_{file.filename}"
    shutil.copyfile(file.filename, output_filename)

    return {"image_link": f"/static/{output_filename}"}

@app.get("/", response_class=HTMLResponse)
async def get_form():
    return """
    <form action="/uploadfile/" enctype="multipart/form-data" method="post">
        <input name="file" type="file">
        <input type="submit">
    </form>
    """

if __name__ == "__main__":
    import uvicorn

    uvicorn.run(app, host="127.0.0.1", port=8000)