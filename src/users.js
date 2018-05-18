import React from 'react';
import {
    List, Datagrid, EmailField, TextField, 
    SimpleForm, Create, Edit,
    DisabledInput, TextInput,
    EditButton
} from 'react-admin';

export const UserList = (props) => (

    <List title="All Users Here" {...props}>
        <Datagrid>
            <TextField source="id" />
            <EmailField source="email" />
            <TextField source="first_name" />
            <TextField source="last_name" />
            <TextField source="address" />
            <TextField source="phone" />
            <TextField source="birthday" />
            <TextField source="gender" />
            <TextField source="photo" />
            <TextField source="about" />
            <EditButton />
        </Datagrid>
    </List>

);

const UserTitle = ({ record }) => {
    return <span>Hy, {record ? JSON.parse(`"${record.first_name}"`) : ''} edit your form here!</span>;
};


export const UserEdit = (props) => (
    <Edit title={<UserTitle />} {...props}>
        <SimpleForm>
            <DisabledInput source="id" />
            <TextInput source='email' />
            <TextInput source='first_name' />
            <TextInput source='last_name' />
            <TextInput source='address' />
            <TextInput source='phone' />
            <TextInput source='birthday' />
            <TextInput source='gender' />
            <TextInput source='photo' />
            <TextInput source="about" />
        </SimpleForm>
    </Edit>
);


export const UserCreate = (props) => (

    <Create {...props}>
        <SimpleForm>
            <DisabledInput source="id" />
            <TextInput source='email' />
            <TextInput source='first_name' />
            <TextInput source='last_name' />
            <TextInput source='address' />
            <TextInput source='phone' />
            <TextInput source='birthday' />
            <TextInput source='gender' />
            <TextInput source='photo' />
            <TextInput source="about" />
        </SimpleForm>
    </Create>
)