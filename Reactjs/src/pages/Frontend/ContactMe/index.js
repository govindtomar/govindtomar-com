import React from 'react'
import { useFormik } from 'formik';
import * as Yup from 'yup';
import ContactDetails from './ContactDetails'
import { styled } from '@mui/material/styles';

// material
import {
  Container,
  Grid,
  Paper,
  Button,
  TextField
} from '@mui/material';
import PageHeader from 'src/pages/Frontend/components/PageHeader';

import Page from 'src/components/Page'
import Iconify from 'src/components/Iconify';
import axios from 'axios';
import { toast } from "react-toastify";


// ----------------------------------------------------------------------

const PaperStyle = styled(Paper)(({ theme }) => ({
  borderRadius: 0,
  background: 'transparent',
  [theme.breakpoints.up('lg')]: {
    marginTop: 120
  },
}));


export default function ContactMe() {


  const formik = useFormik({
    initialValues: {
      name: '',
      email: '',
      phone: '',
      message: '',
    },
    validationSchema: Yup.object({
      name: Yup.string().required('Name is required'),
      phone: Yup.number().required('Phone Number is required'),
      email: Yup.string().email('Email must be a valid email address')
        .required('E-mail Address is required'),
      message: Yup.string().required('Your query is important for me')
    }),
    onSubmit: (formValue) => {
      axios.post(`${process.env.REACT_APP_API_URL}/contact-me`, formValue)
        .then(function (response) {
          toast.success(response.data.message);
        })
        .catch(function (error) {
          console.log(error);
        });
    }
  });


  return (
    <Page title="Contact Me | Govind Singh Tomar">
      <PaperStyle>
        <Container maxWidth="lg">
          <PageHeader>Contact Me</PageHeader>
          <Grid container spacing={4} mt={4} mb={6}>
            <Grid item xs={12} md={4}>
              <ContactDetails />
            </Grid>
            <Grid item xs={12} md={8} pt={3}>
              <form onSubmit={formik.handleSubmit}>
                <Grid container spacing={4}>
                  <Grid item md={12} sm={12} xs={12}>
                    <TextField
                      error={Boolean(formik.touched.name && formik.errors.name)}
                      fullWidth
                      helperText={formik.touched.name && formik.errors.name}
                      label="Color Name"
                      margin="normal"
                      name="name"
                      onBlur={formik.handleBlur}
                      onChange={formik.handleChange}
                      value={formik.values.name}
                      variant="outlined"
                      color="form"
                    />
                  </Grid>
                  <Grid item md={6} sm={12} xs={12}>
                    <TextField
                      error={Boolean(formik.touched.email && formik.errors.email)}
                      fullWidth
                      helperText={formik.touched.email && formik.errors.email}
                      label="E-mail Address"
                      margin="normal"
                      name="email"
                      onBlur={formik.handleBlur}
                      onChange={formik.handleChange}
                      value={formik.values.email}
                      variant="outlined"
                      color="form"
                    />
                  </Grid>
                  <Grid item md={6} sm={12} xs={12}>

                    <TextField
                      error={Boolean(formik.touched.phone && formik.errors.phone)}
                      fullWidth
                      helperText={formik.touched.phone && formik.errors.phone}
                      label="Phone Number"
                      margin="normal"
                      name="phone"
                      onBlur={formik.handleBlur}
                      onChange={formik.handleChange}
                      value={formik.values.phone}
                      variant="outlined"
                      color="form"
                    />
                  </Grid>
                  <Grid item md={12} sm={12} xs={12}>
                    <TextField
                      error={Boolean(formik.touched.message && formik.errors.message)}
                      fullWidth
                      helperText={formik.touched.message && formik.errors.message}
                      label="Tell Us About Your Query"
                      margin="normal"
                      name="message"
                      onBlur={formik.handleBlur}
                      onChange={formik.handleChange}
                      value={formik.values.message}
                      variant="outlined"
                      color="form"
                      multiline
                    />
                  </Grid>
                  <Grid item md={12} sm={12} xs={12}>
                    <Button
                      type="submit"
                      variant="contained"
                      endIcon={<Iconify icon="material-symbols:arrow-right-alt-rounded" />}
                      size="large"
                    >
                      Submit
                    </Button>
                  </Grid>
                </Grid>
              </form>
            </Grid>
          </Grid>
        </Container>
      </PaperStyle>
    </Page>
  );
}

