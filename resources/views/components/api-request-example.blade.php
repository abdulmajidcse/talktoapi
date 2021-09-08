var requestOptions = {
    method: '{{ $method }}',
    @if ($formDataIs)body: formdata, @endif 
};

fetch("{{ $apiUrl }}", requestOptions)
    .then((response) => response.json())
    .then((response) => {
        // form validation or others errors
        if (response.errors) {
            console.log(response.errors);
        } else {
            console.log(response.data);
        }
    })
    .catch(errors => {
        // Internal or External errors
        console.log(errors);
    });